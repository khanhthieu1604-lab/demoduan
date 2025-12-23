<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BrandCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BrandCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        if (! backpack_user()->hasRole('super-admin|companyManager')) {
            return abort(403);
        }

        CRUD::setModel(\App\Models\Brand::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/brand');
        CRUD::setEntityNameStrings('brand', 'brands');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (backpack_user()->hasPermissionTo('brandList')) {
            $this->crud->allowAccess(['list']);
        } else {
            return abort(403);
        }
        // CRUD::setFromDb(); // columns
        CRUD::addColumns([
            'brand_name',
            [
                'name' => 'status',
                'label' => 'Status',
                'type' => 'boolean',
                'options' => [0 => 'disable', 1 => 'enable'],
                'wrapper' => [
                    'element' => 'span',
                    'class'   => function ($crud, $column, $entry, $related_key) {
                        if ($column['text'] == 'enable') {
                            return 'badge badge-success';
                        }

                        return 'badge badge-default';
                    },
                ],
            ],

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
        if (backpack_user()->hasPermissionTo('brandCreate')) {
            $this->crud->allowAccess(['create']);
        } else {
            return abort(403);
        }
        CRUD::setValidation(BrandRequest::class);

        CRUD::addFields([
            [
                'name' => 'brand_name',
                'label' => 'Brand name',
                'type' => 'text'
            ]
            // [
            //     'label' => 'Status',
            //     'name' => 'status',
            //     'type' => 'radio',
            //     'options' => [
            //         1 => "enable",
            //         0 => "disable",
            //     ],
            //     'default' => 1,
            //     'inline' => true,
            // ]
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
        if (backpack_user()->hasPermissionTo('brandUpdate')) {
            /*se cac quyen o duoi*/
            // $this->crud->allowAccess(['list', 'create', 'delete']);
            $this->crud->allowAccess(['update']);
        } else {
            return abort(403);
        }
        $this->setupCreateOperation();
    }
}
