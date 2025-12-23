<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        if (!backpack_user()->hasRole('super-admin|companyManager|employer')) {
            return abort(403);
        }

        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer');
        CRUD::setEntityNameStrings('customer', 'customers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (backpack_user()->hasPermissionTo('customerList')) {
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
            ],
            'address',
            [
                'name' => 'customer_status',
                'label' => 'Status',
                'type' => 'radio',
                'options' => [
                    'Verifying' => 'Verifying',
                    'Accepted' => 'Accepted',
                    'Rejected' => 'Rejected',
                ],
                'wrapper' => [
                    'element' => 'span',
                    'class'   => function ($crud, $column, $entry, $related_key) {
                        if ($column['text'] == 'Accepted') {
                            return 'badge badge-success';
                        }
                        if ($column['text'] == 'Rejected') {
                            return 'badge badge-danger';
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
        if (backpack_user()->hasPermissionTo('customerCreate')) {
            $this->crud->allowAccess('create');
        } else {
            return abort(403);
        }

        CRUD::setValidation(CustomerRequest::class);

        CRUD::addField([
            'name'  => 'address',
            'label' => 'Address',
            'type'  => 'address_google',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name' => 'phone_number',
            'label' => 'Phone Number',
            'type' => 'text',
            'tab' => 'Texts',
        ]);
        CRUD::addField([
            'name'  => 'driver_license',
            'label' => 'Driver license',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name'  => 'id_card',
            'label' => 'Card ID',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name'  => 'passport',
            'label' => 'Passport number',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name'  => 'customer_status',
            'label' => 'Status',
            'type'  => 'enum',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name' => 'images',
            'label' => 'Personal Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'customer',
            'tab' => 'Texts'
        ]);
        CRUD::addField([
            'name' => 'id_image_f',
            'label' => 'ID Image (Front)',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'customer',
            'tab' => 'Texts'
        ]);
        CRUD::addField([
            'name' => 'id_image_b',
            'label' => 'ID Image (Back)',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'customer',
            'tab' => 'Texts'
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
        if (backpack_user()->hasPermissionTo('customerUpdate')) {
            $this->crud->allowAccess('update');
        } else {
            return abort(403);
        }

        CRUD::setValidation(CustomerRequest::class);

        CRUD::addField([
            'name'  => 'address',
            'label' => 'Address',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name' => 'phone_number',
            'label' => 'Phone Number',
            'type' => 'text',
            'tab' => 'Tests'
        ]);
        CRUD::addField([
            'name'  => 'driver_license',
            'label' => 'Driver license',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name'  => 'id_card',
            'label' => 'Card ID',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name'  => 'passport',
            'label' => 'Passport number',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name'  => 'customer_status',
            'label' => 'Status',
            'type'  => 'enum',
            'tab'   => 'Texts',
        ]);
        CRUD::addField([
            'name' => 'images',
            'label' => 'Personal Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'customer',
            'tab' => 'Texts'
        ]);
        CRUD::addField([
            'name' => 'id_image_f',
            'label' => 'ID Image (Front)',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'customer',
            'tab' => 'Texts'
        ]);
        CRUD::addField([
            'name' => 'id_image_b',
            'label' => 'ID Image (Back)',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'customer',
            'tab' => 'Texts'
        ]);

        // $this->crud->addField(
        //     [
        //         'name'  => 'address',
        //         'label' => 'Address',
        //         'type'  => 'address_google',
        //         'tab'   => 'Texts',
        //     ],
        // );
        // $this->crud->addField(
        //     [
        //         'name'  => 'driver_license',
        //         'label' => 'Driver license',
        //         'type'  => 'text',
        //         'tab'   => 'Texts',
        //     ],
        // );
        // $this->crud->addField(
        //     [
        //         'name'  => 'id_card',
        //         'label' => 'Card ID',
        //         'type'  => 'text',
        //         'tab'   => 'Texts',
        //     ],
        // );
        // $this->crud->addField(
        //     [
        //         'name'  => 'passport',
        //         'label' => 'Passport number',
        //         'type'  => 'text',
        //         'tab'   => 'Texts',
        //     ],
        // );
        // $this->crud->addField(
        //     [
        //         'name'  => 'customer_status',
        //         'label' => 'Status',
        //         'type'  => 'enum',
        //         'tab'   => 'Texts',
        //     ],
        // );
        // $this->crud->addField(
        //     [
        //         'name' => 'images',
        //         'label' => 'Vihicle Image',
        //         'type' => 'upload',
        //         'upload' => true,
        //         'disk' => 'customer',
        //         'tab' => 'Texts'
        //     ],
        // );
        // $this->crud->addField(
        //     [
        //         'name' => 'id_image_f',
        //         'label' => 'ID Image (Front)',
        //         'type' => 'upload',
        //         'upload' => true,
        //         'disk' => 'customer',
        //         'tab' => 'Texts'
        //     ],
        // );
        // $this->crud->addField(
        //     [
        //         'name' => 'id_image_b',
        //         'label' => 'ID Image (Back)',
        //         'type' => 'upload',
        //         'upload' => true,
        //         'disk' => 'customer',
        //         'tab' => 'Texts'
        //     ],
        // );
    }

    public function destroy($id)
    {
        if (backpack_user()->hasPermissionTo('customerDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    // public function show($id)
    // {
    //     if(backpack_user()->hasPermissionTo('customerShow')) {
    //         // custom logic before
    //         $content = $this->traitShow($id);
    //         // cutom logic after
    //         return $content;
    //     } else {
    //         return abort(403);
    //     }
    // }
    public function setupShowOperation()
    {
        if (backpack_user()->hasPermissionTo('customerShow')) {
            $this->crud->allowAccess('show');
        } else {
            return abort(403);
        }

        $this->crud->set('show.setFromDb', false);

        $this->crud->addColumn([
            'name'  => 'user_id',
            'label' => 'User',
            'type'  => 'select',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "App\User",
            'options' => (function ($query) {
                return $query->orderBy('name', 'asc')->get();
            }),
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'address',
            'label' => 'Address',
            'type'  => 'address_google',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'driver_license',
            'label' => 'Driver license',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'id_card',
            'label' => 'Card ID',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'passport',
            'label' => 'Passport number',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'customer_status',
            'label' => 'Status',
            'type'  => 'enum',
            'tab'   => 'Texts',
        ]);

        // $this->crud->addColumn([
        //     'name'  => 'company_id',
        //     'label' => 'Company',
        //     'type'  => 'text',
        //     'entity' => 'company',
        //     'attribute' => 'company_name',
        //     'model' => "App\Models\Company",
        //     'options' => (function ($query) {
        //         return $query->orderBy('company_name', 'asc')->where('status', 1)->get();
        //     }),
        //     'tab'   => 'Texts',
        // ]);

        $this->crud->addColumn([
            'name' => 'images',
            'label' => "Personal Image",
            'type' => 'image',
            'prefix' => 'userimages/',
            'height' => '200px',
            'width'  => '200px',
            'multiple' => true,
            'mime_types' => ['userimages'],
            'attribute' => 'userimages',
        ]);

        $this->crud->addColumn([
            'name' => 'id_image_b',
            'label' => "ID Image (Front)",
            'type' => 'image',
            'prefix' => 'idimages/',
            'height' => '200px',
            'width'  => '200px',
            'multiple' => true,
            'mime_types' => ['id_image_b'],
            'attribute' => 'id_image_b',
        ]);

        $this->crud->addColumn([
            'name' => 'id_image_f',
            'label' => "ID Image (Front)",
            'type' => 'image',
            'prefix' => 'idimages/',
            'height' => '200px',
            'width'  => '200px',
            'multiple' => true,
            'mime_types' => ['id_image_f'],
            'attribute' => 'id_image_f',
        ]);
    }
}
