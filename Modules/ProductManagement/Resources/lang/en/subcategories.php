<?php

return [
    'list resource' => 'List Subcategories',
    'create resource' => 'Create Subcategories',
    'edit resource' => 'Edit Subcategories',
    'destroy resource' => 'Destroy Subcategories',
    'title' => [
        'subcategories' => 'Subcategory',
        'create subcategory' => 'Create a Subcategory',
        'edit subcategory' => 'Edit a Subcategory',
    ],
    'button' => [
        'create subcategory' => 'Create a Subcategory',
    ],
    'table' => [
    ],
    'form' => [
    ],
    'messages' => [
    ],
    'validation' => [
    ],
    'attributes'=>[
        'status' => 'SubCategory Status',
        'statuses' => [
            \Modules\ProductManagement\Entities\Subcategory::ACTIVE => 'Active',
            \Modules\ProductManagement\Entities\Subcategory::INACTIVE => 'Inactive',
        ],
    ]
];
