<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ItemRequest as StoreRequest;
use App\Http\Requests\ItemRequest as UpdateRequest;

class ItemCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Item');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/item');
        $this->crud->setEntityNameStrings('item', 'items');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | COLUMNS
        |--------------------------------------------------------------------------
        */
        $this->setColums();

        /*
        |--------------------------------------------------------------------------
        | FIELDS
        |--------------------------------------------------------------------------
        */
        $this->setFields();
    }

    public function setFields()
    {

        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => 'Nom',
                'type'  => 'text',

            ],
            [
                'name'  => 'title',
                'label' => 'Titre',
                'type'  => 'text',

            ],
            [
                'name'  => 'status',
                'label' => 'Statut',
                'type'  => 'text',
                'hint' => 'Email pour les administrateurs, code d\'accès pour les associations'

            ],
            [
                'name'  => 'price',
                'label' => 'Prix',
                'type'  => 'text',
            ],
            [
                'name'  => 'size',
                'label' => 'Taille',
                'type'  => 'text',
            ],
            [
                'name'  => 'image',
                'label' => 'Image',
                'type'  => 'text',
            ],
            [
                'label'     => 'Statut',
                'name'      => 'status',
                'type' => 'radio',
                'options' => [ // the key will be stored in the db, the value will be shown as label;
                    'pending' => "en attente",
                    'validated' => "validé",
                    'selled'=> "vendu"
                ],
                // optional
                'inline' => true, // show the radios all on the same line?
            ],
        ]);
    }

    public function setColums()
    {

        $this->crud->addColumns([
          [
              'name'  => 'title',
              'label' => 'Titre',
              'type'  => 'text',

          ],
          [
              'name'  => 'status',
              'label' => 'Statut',
              'type'  => 'text',
              'hint' => 'Email pour les administrateurs, code d\'accès pour les associations'

          ],
        ]);

    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
