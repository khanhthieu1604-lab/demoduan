<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompanyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\User;
use App\Models\Company;

/**
 * Class CompanyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CompanyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        if (!backpack_user()->hasRole('super-admin')) {
            return abort(403);
        }

        CRUD::setModel(\App\Models\Company::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/company');
        CRUD::setEntityNameStrings('company', 'companies');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (backpack_user()->hasPermissionTo('companyList')) {
            $this->crud->allowAccess('list');
        } else {
            return abort(403);
        }

        // $companyId = backpack_user()->company_id;
        // if(backpack_user()->hasRole('admin|employer')) {
        //     CRUD::addClause('where','id', $companyId);
        // }

        CRUD::addColumns([
            [
                'name' => 'company_name',
                'label' => 'Name',
                'type' => 'text',

            ],
            [
                'name' => 'company_status',
                'label' => 'Company Status',
                'type' => 'radio',
                'options' => [
                    'Operating' => 'Operating',
                    'Closed' => 'Closed',
                ],
                'wrapper' => [
                    'element' => 'span',
                    'class'   => function ($crud, $column, $entry, $related_key) {
                        if ($column['text'] == 'Operating') {
                            return 'badge badge-success';
                        }
                        return 'badge badge-default';
                    },
                ],
            ],
        ]);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        if (backpack_user()->hasPermissionTo('companyCreate')) {
            $this->crud->allowAccess('create');
        } else {
            return abort(403);
        }

        CRUD::setValidation(CompanyRequest::class);

        // CRUD::setFromDb(); // fields

        CRUD::addField([   // Textarea
            'name'  => 'company_name',
            'label' => 'Company Name',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'Street number',
            'name' => 'address_number',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'Ward',
            'name' => 'address_ward',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'District',
            'name' => 'address_district',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'City',
            'name' => 'address_city',
            'type' => 'text',
            'default' => 'Ho Chi Minh',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'Country',
            'name' => 'address_country',
            'type' => 'text',
            'default' => 'Viet Nam',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'Tax code',
            'name' => 'tax_code',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'Phone number',
            'name' => 'phone_number',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'Hotline',
            'name' => 'hotline',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'label' => 'Fax',
            'name' => 'fax',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        // CRUD::addField([
        //     'label' => 'User of Company',
        //     'name' => 'user_id',
        //     'type' => 'checklist',
        //     'entity'    => 'user',
        //     'attribute' => 'name',
        //     'model'     => "App\User",
        //     'pivot'     => true,
        //     'tab' => 'Texts'
        // ]);

        // CRUD::addField([
        //     'label' => 'Status',
        //     'name' => 'status',
        //     'type' => 'radio',
        //     'options' => [
        //         1 => "enable",
        //         0 => "disable",
        //     ],
        //     'default' => 1,
        //     'inline' => true,
        //     'tab' => 'Texts'
        // ]);

        CRUD::addField([
            'name' => 'company_status',
            'label' => 'Company Status',
            'type' => 'enum',
            // 'type' => 'radio',
            // 'options' => [
            //     1 => "enable",
            //     0 => "disable",
            // ],
            // 'default' => 1,
            // 'inline' => true,
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => 'Company Logo',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'company',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'name' => 'images',
            'label' => 'Company Images',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'company',
            // 'prefix' => 'vihicle/',
            // 'prefix' => 'public/uploads/',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'name' => 'images',
            'label' => 'Vihicle Images',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'vihicle',
            // 'prefix' => 'vihicle/',
            // 'prefix' => 'public/uploads/',
            'tab' => 'Texts'
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */

        $this->crud->setOperationSetting('contentClass', 'col-md-12');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        if (backpack_user()->hasPermissionTo('companyUpdate')) {
            $this->crud->allowAccess('update');
        } else {
            return abort(403);
        }

        $this->setupCreateOperation();
    }

    public function destroy($id)
    {
        if (backpack_user()->hasPermissionTo('companyDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    protected function setupShowOperation()
    {
        if (backpack_user()->hasPermissionTo('companyShow')) {
            $this->crud->allowAccess(['show']);
        } else {
            return abort(403);
        }

        $this->crud->set('show.setFromDb', false);

        $this->crud->addColumn([   // Textarea
            'name'  => 'company_name',
            'label' => 'Company Name',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Company Logo',
            'type' => 'image',
            'prefix' => './',
            'height' => '200px',
            'width' => '200px',
            'multiple' => true,
            'mime_types' => ['image'],
            'attribute' => 'image',
        ]);

        $this->crud->addColumn([
            'name' => 'images',
            'label' => 'Vihicle Image',
            'type' => 'image',
            'prefix' => './',
            'height' => '200px',
            'width' => '200px',
            'multiple' => true,
            'mime_types' => ['images'],
            'attribute' => 'images',
        ]);

        $this->crud->addColumn([
            'label' => 'Street number',
            'name' => 'address_number',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'Ward',
            'name' => 'address_ward',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'District',
            'name' => 'address_district',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'City',
            'name' => 'address_city',
            'type' => 'text',
            'default' => 'Ho Chi Minh',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'Country',
            'name' => 'address_country',
            'type' => 'text',
            'default' => 'Viet Nam',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'Tax code',
            'name' => 'tax_code',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'Phone number',
            'name' => 'phone_number',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'Hotline',
            'name' => 'hotline',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'label' => 'Fax',
            'name' => 'fax',
            'type' => 'text',
            'tab' => 'Texts'
        ]);

        $this->crud->addColumn([
            'name' => 'company_status',
            'label' => 'Company Status',
            'type' => 'enum',
            'tab' => 'Texts'
        ]);
    }

    // public function show($id)
    // {
    //     if (backpack_user()->hasPermissionTo('companyShow')) {
    //         // custom logic before
    //         $content = $this->traitShow($id);
    //         // cutom logic after
    //         return $content;
    //     } else {
    //         return abort(403);
    //     }
    // }
}
