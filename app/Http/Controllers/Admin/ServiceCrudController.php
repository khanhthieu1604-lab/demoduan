<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('service', 'services');

        if (! backpack_user()->hasRole('super-admin|companyManager|employer')) {
            return abort(403);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (backpack_user()->hasPermissionTo('serviceList')) {
            $this->crud->allowAccess('list');
        } else {
            return abort(403);
        }

        // CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */

        CRUD::addColumns([
            'service_name',
            'price',
            'time',
            'distance',
            [
                'label' => 'Status',
                'name' => 'status', 
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
        if (backpack_user()->hasPermissionTo('serviceCreate')) {
            $this->crud->allowAccess('create');
        } else {
            return abort(403);
        }

        CRUD::setValidation(ServiceRequest::class);

        // CRUD::setFromDb(); // fields

        CRUD::addField([
            'label' => 'Name Service',
            'name' => 'service_name',
            'type' => 'textarea',
            
        ]);

        CRUD::addField([
            'label' => 'Price',
            'name' => 'price',
            'type' => 'text',
           
        ]);

        CRUD::addField([
            'label' => 'Time rent',
            'name' => 'time',
            'type' => 'text',
           
        ]);

        CRUD::addField([
            'label' => 'Distance',
            'name' => 'distance',
            'type' => 'text',
           
        ]);

        CRUD::addField([
            'label' => 'Status',
            'name' => 'status',
            'type' => 'radio',
            'options' => [
                1 => "enable",
                0 => "disable",
            ],
            'default' => 1,
            'inline' => true,
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
        if (backpack_user()->hasPermissionTo('serviceUpdate')) {
            $this->crud->allowAccess('update');
        } else {
            return abort(403);
        }
        $this->setupCreateOperation();
    }

    public function destroy($id)
    {
        if(backpack_user()->hasPermissionTo('serviceDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    public function show($id)
    {
        if(backpack_user()->hasPermissionTo('serviceShow')) {
            // custom logic before
            $content = $this->traitShow($id);
            // cutom logic after
            return $content;
        } else {
            return abort(403);
        }
    }
}
