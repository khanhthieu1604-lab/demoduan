<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('news', 'news');
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
        if (backpack_user()->hasPermissionTo('newslist')) {
            $this->crud->allowAccess('list');
        } else {
            return abort(403);
        }

        CRUD::addColumns([
            'header_news', 
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
        if (backpack_user()->hasPermissionTo('newsCreate')) {
            $this->crud->allowAccess('create');
        } else {
            return abort(403);
        }

        CRUD::setValidation(NewsRequest::class);

        CRUD::addFields([
            [
                'name' => 'header_news',
                'label' => 'Header',
                'type' => 'textarea',
                'tab' => 'Texts'
            ],
            [
                'name' => 'content_short',
                'label' => 'Content short',
                'type' => 'ckeditor',
                'tab' => 'Texts'
            ],
            [
                'name' => 'content_full',
                'label' => 'Content full',
                'type' => 'ckeditor',
                'tab' => 'Texts'
            ],
            [
                'label' => 'Status',
                'name' => 'status',
                'type' => 'radio',
                'options' => [
                    1 => "enable",
                    0 => "disable",
                ],
                'default' => 1,
                'inline' => true,
                'tab' => 'Texts'
            ],
            [
                'name' => 'news_images',
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
        if (backpack_user()->hasPermissionTo('newsUpdate')) {
            $this->crud->allowAccess('update');
        } else {
            return abort(403);
        }
        $this->setupCreateOperation();
    }

    public function destroy($id)
    {
        if(backpack_user()->hasPermissionTo('newsDelete')) {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        } else {
            return abort(403);
        }
    }

    public function show($id)
    {
        if(backpack_user()->hasPermissionTo('newsShow')) {
            // custom logic before
            $content = $this->traitShow($id);
            // cutom logic after
            return $content;
        } else {
            return abort(403);
        }
    }
}
