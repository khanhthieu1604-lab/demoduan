<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DriverRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DriverCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DriverCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        if (! backpack_user()->hasRole('super-admin|companyManager|employer')) {
            return abort(403);
        } 

        CRUD::setModel(\App\Models\Driver::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/driver');
        CRUD::setEntityNameStrings('driver', 'drivers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (backpack_user()->hasPermissionTo('driverList')) {
            $this->crud->allowAccess('list');
        } else {
            return abort(403);
        }

        CRUD::addColumns([
            'driver_name','experience'
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
        if (backpack_user()->hasPermissionTo('driverCreate')) {
            $this->crud->allowAccess('create');
        } else {
            return abort(403);
        }

        CRUD::setValidation(DriverRequest::class);

        CRUD::addFields([
            [
                'name' => 'driver_name',
                'label' => 'Name',
                'type' => 'text',
                'tab' => 'Texts'
            ],
            [
                'name' => 'sex',
                'label' => 'Sex',
                'type'        => 'select2_from_array',
                'options'     => [
                    'male' => 'Male',
                    'female' => 'Female', 
                ],
                'allows_null' => false,
                'tab' => 'Texts'
            ],
            [
                'name' => 'age',
                'label' => 'Age',
                'type' => 'number',
                'tab' => 'Texts'
            ],
            [
                'name' => 'phone_number',
                'label' => 'Phone number',
                'type' => 'text',
                'tab' => 'Texts'
            ],
            [
                'name' => 'experience',
                'label' => 'Experience',
                'type' => 'text',
                'tab' => 'Texts'
            ],
            [
                'name' => 'driver_images',
                'label' => 'Images',
                'type' => 'browse_multiple',
                'multiple' => true,
                'mime_types' => ['image'],
                'tab' => 'Upload Image'
            ]
        ]); 
       
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        if (backpack_user()->hasPermissionTo('driverUpdate')) {
            $this->crud->allowAccess('update');
        } else {
            return abort(403);
        }

        $this->setupCreateOperation();
    }

    public function destroy($id)
    {
        if(backpack_user()->hasPermissionTo('driverDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    public function show($id)
    {
        if(backpack_user()->hasPermissionTo('driverShow')) {
            // custom logic before
            $content = $this->traitShow($id);
            // cutom logic after
            return $content;
        } else {
            return abort(403);
        }
    }
}
