<?php

namespace moltox\yabe\Database\seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsAndRolesSeeder extends Seeder {

    private $permissions;

    private $roles;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->createPermissions();

        $this->createRoles();

        $this->assignPermissionsToRoles();

        $this->assignRolesToUsers();

    }

    private function createPermissions() {

        $permissions[] = Permission::create( [ 'name' => 'grant user menu' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user list' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user edit' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user show' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user create' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user delete' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user change password']);
        $permissions[] = Permission::create( [ 'name' => 'grant user give permission' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user remove permission' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user give role' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant user remove role' ] );

        $permissions[] = Permission::create( [ 'name' => 'grant permission create' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant permission menu' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant permission list' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant permission edit' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant permission show' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant permission delete' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant permission add to role' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant permission remove from role' ] );

        $permissions[] = Permission::create( [ 'name' => 'grant role create' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant role menu' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant role list' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant role edit' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant role show' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant role delete' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant role give permission' ] );
        $permissions[] = Permission::create( [ 'name' => 'grant role remove permission' ] );

        $this->permissions = $permissions;

    }

    private function createRoles() {

        $roles[] = Role::create( [ 'name' => 'Super Admin' ] );
        $roles[] = Role::create( [ 'name' => 'Admin' ] );
        $roles[] = Role::create( [ 'name' => 'Moderator' ] );
        $roles[] = Role::create( [ 'name' => 'Guest' ] );

        $this->roles = $roles;

    }

    private function assignPermissionsToRoles() {

        $roles = $this->roles;

        $roles[ 1 ]->syncPermissions( $this->permissions );

    }

    private function assignRolesToUsers() {

        $superadmin = \App\User::find(1);
        $superadmin->assignRole('Super Admin');

        $admin = \App\User::find(2);
        $admin->assignRole('Admin');

        $moderator = \App\User::find(3);
        $moderator->assignRole('Moderator');

    }

}

