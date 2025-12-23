<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContractRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Models\Vihicle;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;

/**
 * Class ContractCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContractCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
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

        CRUD::setModel(\App\Models\Contract::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contract');
        CRUD::setEntityNameStrings('contract', 'contracts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (backpack_user()->hasPermissionTo('contractList')) {
            $this->crud->allowAccess('list');
        } else {
            return abort(403);
        }

        CRUD::addColumns([
            [
                'label' => 'Customer',
                'name' => 'customer_id',
                'type' => 'select',
                'entity' => 'customer',
                'attribute' => 'phone_number',
                'model' => "App\Models\Customer"
            ],
            [
                'name' => 'contract_status',
                'label' => 'Contract Status',
                'type' => 'radio',
                'options' => [
                    'Verifying' => 'Verifying',
                    'Deposit' => 'Deposit',
                    'Rejected' => 'Rejected',
                    'Deposited' => 'Deposited',
                    'Delivery' => 'Delivery',
                    'Rentaling' => 'Rentaling',
                    'Return' => 'Return',
                    'Cancel' => 'Cancel',
                    'Finish' => 'Finish'
                ],
                'wrapper' => [
                    'element' => 'span',
                    'class'   => function ($crud, $column, $entry, $related_key) {
                        if ($column['text'] == 'Finish') {
                            return 'badge badge-success';
                        }
                        if ($column['text'] == 'Deposited') {
                            return 'badge badge-success';
                        }
                        if ($column['text'] == 'Delivery') {
                            return 'badge badge-success';
                        }
                        if ($column['text'] == 'Rentaling') {
                            return 'badge badge-success';
                        }
                        if ($column['text'] == 'Deposit') {
                            return 'badge badge-info';
                        }
                        if ($column['text'] == 'Return') {
                            return 'badge badge-info';
                        }
                        if ($column['text'] == 'Cancel') {
                            return 'badge badge-danger';
                        }
                        if ($column['text'] == 'Rejected') {
                            return 'badge badge-danger';
                        }
                        return 'badge badge-default';
                    },
                ],
            ],
            [
                'name' => 'driver_status',
                'label' => 'Driver Status'
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
        if (backpack_user()->hasPermissionTo('contractCreate')) {
            $this->crud->allowAccess('create');
        } else {
            return abort(403);
        }

        CRUD::setValidation(ContractRequest::class);

        CRUD::addFields([
            // [
            //     'name' => 'customer_id',
            //     'label' => 'Customer ID',
            //     'type'  => 'select',
            //     'entity' => 'customer',
            //     'attribute' => 'email',
            //     'model' => "App\Models\Customer",
            //     'options' => (function($query){
            //         return $query->where('status', 'Accepted')->get();
            //     }),
            // ],
            // [
            //     'name' => 'vihicle_id',
            //     'label' => 'Vihicle ID',
            //     'type'  => 'select',
            //     'entity' => 'vihicle',
            //     'attribute' => 'name',
            //     'model' => "App\Models\Vihicle",
            //     'options' => (function ($query) {
            //         return $query->orderBy('name', 'asc')->where('vihicle_status', 1)->get();
            //     }),
            // ],
            // [
            //     'name' => 'company_id',
            //     'label' => 'Company ID',
            //     'type'  => 'select',
            //     'entity' => 'company',
            //     'attribute' => 'name',
            //     'model' => "App\Models\Company",
            //     'options' => (function($query){
            //         return $query->where('id', backpack_user()->company_id)->where('status', 1)->orderBy('id', 'desc')->get();
            //     }),
            // ],
            [
                'name'  => 'pickup_location',
                'label' => 'Pick Up Location',
                'type'  => 'text',
                'tab'   => 'Texts',
            ],
            [
                'name'  => 'location_togo',
                'label' => 'Location To Go',
                'type'  => 'text',
                'tab'   => 'Texts',
            ],
            [
                'name'  => 'location_dropoff_vihicle',
                'label' => 'Location Dropoff Vihicle',
                'type'  => 'text',
                'tab'   => 'Texts',
            ],
            [
                'name'  => 'pickup_time',
                'label' => 'Pick Up Time',
                'type'  => 'text',
                'tab'   => 'Texts',
            ],
            [
                'name'  => 'dropoff_time',
                'label' => 'Drop Off Time',
                'type'  => 'text',
                'tab'   => 'Texts',
            ],
            [
                'name'  => 'driver_status',
                'label' => 'Driver Status',
                'type'  => 'text',
                'tab'   => 'Texts',
            ],
            [
                'name'  => 'contract_status',
                'label' => 'Contract Status',
                'type'  => 'enum',
                'tab'   => 'Texts',
            ],
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
        $this->setupCreateOperation();
    }

    protected function update($id)
    {
        if (backpack_user()->hasPermissionTo('contractUpdate')) {
            $this->crud->allowAccess(['update']);
        } else {
            return abort(403);
        }

        $response = $this->traitUpdate();
        // do something after save
        $contracts = Contract::where('id', $id)->first();
        $vihicles = Vihicle::where('id', $contracts->vihicle_id)->first();

        if ($contracts->contract_status === 'Verifying') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Wait']);
        }
        if ($contracts->contract_status === 'Deposit') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Wait']);
        }
        if ($contracts->contract_status === 'Rejected') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Wait']);
        }
        if ($contracts->contract_status === 'Deposited') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Deposited']);
        }
        if ($contracts->contract_status === 'Delivery') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Delivered']);
        }
        if ($contracts->contract_status === 'Rentaling') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Rentaled']);
        }
        if ($contracts->contract_status === 'Return') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Checking']);
        }
        if ($contracts->contract_status === 'Cancel') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Wait']);
        }
        if ($contracts->contract_status === 'Finish') {
            Vihicle::where('id', $contracts->vihicle_id)->update(['vihicle_status' => 'Wait']);
        }

        return $response;
    }

    public function destroy($id)
    {
        if (backpack_user()->hasPermissionTo('contractDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    protected function setupShowOperation()
    {
        if (backpack_user()->hasPermissionTo('contractShow')) {
            $this->crud->allowAccess('show');
        } else {
            return abort(403);
        }

        $this->crud->set('show.setFromDb', false);

        $this->crud->addColumn([
            'name'  => 'pickup_location',
            'label' => 'Pick Up Location',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        $this->crud->addColumn([
            'name'  => 'location_togo',
            'label' => 'Location To Go',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        $this->crud->addColumn([
            'name'  => 'location_dropoff_vihicle',
            'label' => 'Location Dropoff Vihicle',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        $this->crud->addColumn([
            'name'  => 'pickup_time',
            'label' => 'Pick Up Time',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        $this->crud->addColumn([
            'name'  => 'dropoff_time',
            'label' => 'Drop Off Time',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        $this->crud->addColumn([
            'name'  => 'driver_status',
            'label' => 'Driver Status',
            'type'  => 'text',
            'tab'   => 'Texts',
        ]);
        $this->crud->addColumn([
            'name'  => 'contract_status',
            'label' => 'Contract Status',
            'type'  => 'enum',
            'tab'   => 'Texts',
        ]);
    }
}
