<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EmployerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmployerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }

    
    // public function __construct()
    // {
    //     $this->middleware(['role:admin|super-admin']);
    //     parent::__construct();
    // }

    public function setup()
    {
        if (! backpack_user()->hasRole('super-admin|companyManager')) {
            return abort(403);
        } 

        CRUD::setModel(\App\Models\Employer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/employer');
        CRUD::setEntityNameStrings('employer', 'employers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (backpack_user()->hasPermissionTo('employerList')) {
            $this->crud->allowAccess('list');
        } else {
            return abort(403);
        }

        CRUD::addColumns([
            [
                'label' => 'Name',
                'name' => 'user_id',
                'type' => 'select',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => 'App\User'
            ]
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        if (backpack_user()->hasPermissionTo('employerCreate')) {
            $this->crud->allowAccess('create');
        } else {
            return abort(403);
        }

        CRUD::setValidation(EmployerRequest::class);

        CRUD::addField([   
            'name' => 'user_id',
            'label' => 'User',
            'type'  => 'select',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "App\User",
            'options' => (function($query){
                return $query->where('company_id', backpack_user()->company_id)->orderBy('name', 'asc')->get();
            }),
            'tab'   => 'Texts',
        ]);

        CRUD::addField([   
            'name' => 'company_id',
            'label' => 'Company',
            'type'  => 'select',
            'entity' => 'company',
            'attribute' => 'name',
            'model' => "App\Models\Company",
            'options' => (function($query){
                return $query->where('id', backpack_user()->company_id)->where('status', 1)->orderBy('id', 'desc')->get();
            }),
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name' => 'images',
            'label' => 'Images',
            'type' => 'browse_multiple',
            'multiple' => true,
            'mime_types' => ['image'],
            'tab' => 'Upload Image'
        ]);
    }

    protected function setupUpdateOperation()
    {
        if (backpack_user()->hasPermissionTo('employerUpdate')) {
            $this->crud->allowAccess('update');
        } else {
            return abort(403);
        }

        $this->setupCreateOperation();
    }

    public function destroy($id)
    {
        if(backpack_user()->hasPermissionTo('employerDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    public function show($id)
    {
        if(backpack_user()->hasPermissionTo('employerShow')) {
            // custom logic before
            $content = $this->traitShow($id);
            // cutom logic after
            return $content;
        } else {
            return abort(403);
        }
    }
}
