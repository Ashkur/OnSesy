<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
{
    return [
        'view_users',
        'add_users',
        'edit_users',
        'delete_users',

        'view_roles',
        'add_roles',
        'edit_roles',
        'delete_roles',

        'view_candidatos',
        'add_candidatos',
        'edit_candidatos',
        'delete_candidatos',

        'view_edital',
        'add_edital',
        'edit_edital',
        'delete_edital',

        'view_cargos',
        'add_cargos',
        'edit_cargos',
        'delete_cargos',
    ];
}
}
