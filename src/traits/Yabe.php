<?php


namespace moltox\yabe\traits;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

trait Yabe {

    public function field( $fieldname ) {

        return $this->customFields()->getQuery()->where('name', $fieldname)->get()->first();

    }

    public function customFields()  {

        return $this->morphMany('moltox\yabe\Models\CustomField', 'custom_fieldable');

    }

    public function getUnassignedPermissions()  {

        $assignedPermissionsIds = $this->getAllPermissions()->pluck('id');

        $p = Permission::whereNotIn( 'id', $assignedPermissionsIds )->get();

        return $p;

    }

    public function getUnassignedRoles()  {

        $assignedRolesIds = $this->roles()->pluck('id');

        $r = Role::whereNotIn( 'id', $assignedRolesIds )->get();

        return $r;

    }

}
