<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VihicleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VihicleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VihicleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation {
        show as traitShow;
    }

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

        CRUD::setModel(\App\Models\Vihicle::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/vihicle');
        CRUD::setEntityNameStrings('vihicle', 'vihicles');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */

        if (backpack_user()->hasPermissionTo('vihicleList')) {
            $this->crud->allowAccess('list');
        } else {
            return abort(403);
        }

        CRUD::addColumns([
            [
                'name' => 'vihicle_name',
                'label' => 'Name',
            ],
            'brand',
            'color',
            'vihicle_price',
            [
                'name' => 'vihicle_status',
                'label' => 'Vihicle Status',
                'type' => 'radio',
                'options' => [
                    'Wait' => 'Wait',
                    'Deposited' => 'Deposited',
                    'Delivered' => 'Delivered',
                    'Rentaled' => 'Rentaled',
                    'Checking' => 'Checking',
                    'Broken' => 'Broken'
                ],
                'wrapper' => [
                    'element' => 'span',
                    'class'   => function ($crud, $column, $entry, $related_key) {
                        if ($column['text'] === 'Rentaling') {
                            return 'badge badge-success';
                        }
                        if ($column['text'] === 'Delevered') {
                            return 'badge badge-success';
                        }
                        if ($column['text'] === 'Deposited') {
                            return 'badge badge-primary';
                        }
                        if ($column['text'] === 'Broken') {
                            return 'badge badge-danger';
                        }
                        if ($column['text'] === 'Checking') {
                            return 'badge badge-info';
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
        if (backpack_user()->hasPermissionTo('vihicleCreate')) {
            $this->crud->allowAccess(['create']);
        } else {
            return abort(403);
        }

        CRUD::setValidation(VihicleRequest::class);

        CRUD::addField([
            'name'  => 'vihicle_name',
            'label' => 'Name',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name' => 'vihicle_price',
            'label' => 'Price',
            'type' => 'text',
            'tab' => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'license_plate',
            'label' => 'Business License',
            'type'  => 'select_from_array',
            'options' => [
                'transport business license by car',
                'transport business license by motorbike',
                'transport business license by truck',
            ],
            'allow_null' => false,
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'number_chair',
            'label' => 'Number of Chair',
            'type'  => 'number',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'size',
            'label' => 'Size',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'engine',
            'label' => 'Engine',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'cylinder_capacity',
            'label' => 'Cylinder capacity',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'maximum_power',
            'label' => 'Maximum power',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'maximum_torque',
            'label' => 'Maximum torque',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'gearbox',
            'label' => 'Gearbox',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name' => 'color',
            'label' => 'Color',
            'type' => 'text',
            'tab' => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'weight',
            'label' => 'Weight',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'year_manufacture',
            'label' => 'Year manufacture',
            'type'  => 'month',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'register_time',
            'label' => 'Time Register',
            'type'  => 'month',
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name' => 'vihicle_status',
            'label' => 'Status',
            'type' => 'enum',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'name'  => 'company_id',
            'label' => 'Company',
            'type'  => 'select',
            'entity' => 'company',
            'attribute' => 'company_name',
            'model' => "App\Models\Company",
            'options' => (function ($query) {
                return $query->orderBy('company_name', 'ASC')->where('company_status', 1)->get();
            }),
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name'  => 'brand_id',
            'label' => 'Brand',
            'type'  => 'select',
            'entity' => 'brand',
            'attribute' => 'brand_name',
            'model' => "App\Models\Brand",
            'options' => (function ($query) {
                return $query->orderBy('brand_name', 'asc')->where('brand_status', 1)->get();
            }),
            'tab'   => 'Texts',
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => 'Vihicle Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'vihicle',
            'tab' => 'Texts'
        ]);

        CRUD::addField([
            'name' => 'images',
            'label' => 'Vihicle Images',
            'type' => 'upload_multiple',
            'disk' => 'vihicle',
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
        if (backpack_user()->hasPermissionTo('vihicleUpdate')) {
            $this->crud->allowAccess(['update']);
        } else {
            return abort(403);
        }
        $this->setupCreateOperation();
    }

    public function destroy($id)
    {
        if (backpack_user()->hasPermissionTo('vihicleDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    // public function show($id)
    // {
    //     if (backpack_user()->hasPermissionTo('vihicleShow')) {
    //         // custom logic before
    //         $content = $this->traitShow($id);
    //         // cutom logic after
    //         return $content;
    //     } else {
    //         return abort(403);
    //     }
    // }

    protected function setupShowOperation()
    {
        if (backpack_user()->hasPermissionTo('vihicleShow')) {
            $this->crud->allowAccess(['show']);
        } else {
            return abort(403);
        }

        $this->crud->set('show.setFromDb', false);

        // CRUD::setFromDb(); // fields
        $this->crud->addColumn([
            'name'  => 'vihicle_name',
            'label' => 'Name',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name' => 'vihicle_price',
            'label' => 'Price',
            'type' => 'text',
            'tab' => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'license_plate',
            'label' => 'Business License',
            'type'  => 'text',
            // 'options' => [
            //     'transport business license by car',
            //     'transport business license by motorbike',
            //     'transport business license by truck',
            // ],
            'allow_null' => false,
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'number_chair',
            'label' => 'Number of Chair',
            'type'  => 'number',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'size',
            'label' => 'Size',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'engine',
            'label' => 'Engine',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'cylinder_capacity',
            'label' => 'Cylinder capacity',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'maximum_power',
            'label' => 'Maximum power',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'maximum_torque',
            'label' => 'Maximum torque',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'gearbox',
            'label' => 'Gearbox',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        // CRUD::addField([
        //     'name'  => 'color',
        //     'label' => 'Color',
        //     'type'  => 'color',
        //     'default' => '#000000',
        //     // 'color_picker_options' => [
        //     //     'customClass' => 'custom-class'
        //     // ],
        //     'tab'   => 'Texts',
        // ]);

        $this->crud->addColumn([
            'name' => 'color',
            'label' => 'Color',
            'type' => 'text',
            'tab' => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'weight',
            'label' => 'Weight',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'year_manufacture',
            'label' => 'Year manufacture',
            'type'  => 'month',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'register_time',
            'label' => 'Time Register',
            'type'  => 'month',
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'label' => 'Status',
            'name' => 'vihicle_status',
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

        // $this->crud->addColumn([
        //     'name' => 'vihicle_status',
        //     'label' => 'Vihicle Status',
        //     'type' => 'radio',
        //     'options' => [
        //         'Verifying' => 'Verifying',
        //         'Accepted' => 'Accepted',
        //         'Rejected' => 'Rejected',
        //     ],
        //     'wrapper' => [
        //         'element' => 'span',
        //         'class'   => function ($crud, $column, $entry, $related_key) {
        //             if ($column['text'] == 'Accepted') {
        //                 return 'badge badge-success';
        //             }
        //             if ($column['text'] == 'Rejected') {
        //                 return 'badge badge-danger';
        //             }
        //             return 'badge badge-default';
        //         },
        //     ],
        //     'tab' => 'Texts',
        // ]);

        $this->crud->addColumn([
            'name'  => 'company_id',
            'label' => 'Company',
            'type'  => 'select',
            'entity' => 'company',
            'attribute' => 'company_name',
            'model' => "App\Models\Company",
            'options' => (function ($query) {
                return $query->orderBy('company_name', 'ASC')->where('company_status', 1)->get();
            }),
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name'  => 'brand_id',
            'label' => 'Brand',
            'type'  => 'select',
            'entity' => 'brand',
            'attribute' => 'brand_name',
            'model' => "App\Models\Brand",
            'options' => (function ($query) {
                return $query->orderBy('brand_name', 'asc')->where('brand_status', 1)->get();
            }),
            'tab'   => 'Texts',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Vihicle Image',
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
    }
}
