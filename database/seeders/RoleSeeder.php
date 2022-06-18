<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name' => 'Admin']);
       $role2 = Role::create(['name' => 'Cliente']);

       //Permisos para administrador
       Permission::create(['name' => 'home'])->assignRole($role1);
       Permission::create(['name' => 'categorias'])->assignRole($role1);
       Permission::create(['name' => 'ubicacion'])->assignRole($role1);
       Permission::create(['name' => 'proveedores'])->assignRole($role1);
       Permission::create(['name' => 'ordencompra'])->assignRole($role1);
       Permission::create(['name' => 'ventas'])->assignRole($role1);    
       Permission::create(['name' => 'clientes'])->assignRole($role1);
       Permission::create(['name' => 'micuenta'])->syncRoles([$role1]);

       //Permisos para cliente
       Permission::create(['name' => 'pedidos'])->assignRole($role2);
       
    }
}
