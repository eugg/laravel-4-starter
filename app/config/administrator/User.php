<?php

/**
 * Users model config
 */

return array(

    'title' => 'User',

    'single' => 'user',

    'model' => 'User',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'email',
        'gender' => array(
            'title' => "gender",
            'relationship' => 'info', //this is the name of the Eloquent relationship method!
            'select' => "(:table).gender"
        ),
        'username' => array(
            'title' => "username",
            'relationship' => 'info',
            'select' => "(:table).username"
        ),
        'activated'
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'email',
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'email' => array(
            'title' => 'email',
            'type' => 'text',
        ),
        'info' => array(
        'title' => 'username',
        'type' => 'relationship',
        'name_field' => 'username',
    ),

    ),

);
