<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add cart']);
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'customer']);
        $role1->givePermissionTo('add cart');
        $role1->givePermissionTo('edit profile');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password' => Hash::make(123)
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make(123)
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'emrah19830418@gmail.com',
            'password' => Hash::make(12345)
        ]);
        $user->assignRole($role3);

        \App\Models\Seo::create([
            'store_name' => "Car Parts",
            'slogan' => "",
            'store_label' => "",
            'headlineMainPage' => ""
        ]);

        \App\Models\AccountSetting::create([
            'user_id' => 1,
            'first_name' => 'Hadi',
            'last_name' => 'Jaman',
            'company' => 'mamurjor',
            'country' => 'Bangladesh',
            'street' => 'Folpotti',
            'city' => 'Mirpur',
            'state' => 'Dhaka',
            'post_code' => '1212',
            'phone' => '01123456767',
            'is_default' => true
        ]);
        \App\Models\AccountSetting::create([
            'user_id' => 2,
            'first_name' => 'Hadi',
            'last_name' => 'Jaman',
            'company' => 'mamurjor',
            'country' => 'Bangladesh',
            'street' => 'Folpotti',
            'city' => 'Mirpur',
            'state' => 'Dhaka',
            'post_code' => '1212',
            'phone' => '01123456767',
            'is_default' => true
        ]);
        \App\Models\AccountSetting::create([
            'user_id' => 3,
            'first_name' => 'Hadi',
            'last_name' => 'Jaman',
            'company' => 'mamurjor',
            'country' => 'Bangladesh',
            'street' => 'Folpotti',
            'city' => 'Mirpur',
            'state' => 'Dhaka',
            'post_code' => '1212',
            'phone' => '01123456767',
            'is_default' => true
        ]);

        $this->call([
            SettingsSeeder::class,
            PageSeeder::class
        ]);
    }
}
