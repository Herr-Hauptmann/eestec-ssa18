<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        ############ PRIJAVE ###########
        Permission::create(['name' => 'zatvori prijave']);
        Permission::create(['name' => 'otvori prijave']);
        Permission::create(['name' => 'pregledaj prijave']);
        Permission::create(['name' => 'obrisi prijavu']);
        Permission::create(['name' => 'izmjeniti prijavu']);

        ############ NOVOSTI ###########
        Permission::create(['name' => 'dodati novost']);
        Permission::create(['name' => 'izmjeniti novost']);
        Permission::create(['name' => 'obrisati novost']);

        ############ MEDIJI ############
        Permission::create(['name' => 'dodati medij']);
        Permission::create(['name' => 'izmjeniti medij']);
        Permission::create(['name' => 'obrisati medij']);

        ############ PARTNERI ##########
        Permission::create(['name' => 'dodati partnera']);
        Permission::create(['name' => 'izmjeniti partnera']);
        Permission::create(['name' => 'obrsati partnera']);

        ############ TRENERI ###########
        Permission::create(['name' => 'dodaj trenera']);
        Permission::create(['name' => 'izmjeniti trenera']);
        Permission::create(['name' => 'obrisati trenera']);

        ############ TRENINZI ##########
        Permission::create(['name' => 'dodaj trening']);
        Permission::create(['name' => 'izmjeniti trening']);
        Permission::create(['name' => 'obrisati trening']);

        ############ KONTAKT ###########
        Permission::create(['name' => 'dodaj kontakt']);
        Permission::create(['name' => 'izmjeniti kontakt']);
        Permission::create(['name' => 'obrisati kontakt']);

        ############ PARTICIPANT #######


        // create roles and assign permissions
        $role = Role::create(['name' => 'root']);
        $role->givePermissionTo(Permission::pluck('name')); 

        $role = Role::create(['name' => 'organizer']);
        $role->givePermissionTo(array_filter(Permission::pluck('name')->toArray(), function($item) { return stripos($item, 'prijav') === FALSE; }));

        $role = Role::create(['name' => 'participant']);
    }
}
