<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'user.management']);
        Permission::create(['name' => 'role.permission.management']);
        Permission::create(['name' => 'menu.management']);
        Permission::create(['name' => 'location.management']);
        Permission::create(['name' => 'menu.kategori']);
        Permission::create(['name' => 'menu.pekerjaan']);

        //user
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.destroy']);
        Permission::create(['name' => 'user.import']);
        Permission::create(['name' => 'user.export']);

        //Pencari Kerja
        Permission::create(['name' => 'pelamar.index']);
        Permission::create(['name' => 'pelamar.create']);
        Permission::create(['name' => 'pelamar.edit']);
        Permission::create(['name' => 'pelamar.destroy']);
        Permission::create(['name' => 'pelamar.import']);
        Permission::create(['name' => 'pelamar.export']);

        //Perusahaan
        Permission::create(['name' => 'perusahaan.index']);
        Permission::create(['name' => 'perusahaan.create']);
        Permission::create(['name' => 'perusahaan.edit']);
        Permission::create(['name' => 'perusahaan.destroy']);
        Permission::create(['name' => 'perusahaan.import']);
        Permission::create(['name' => 'perusahaan.export']);

        //Contact
        Permission::create(['name' => 'message.index']);
        Permission::create(['name' => 'message.destroy']);

        //Postingan
        Permission::create(['name' => 'postinganadmin.index']);
        Permission::create(['name' => 'postinganadmin.create']);
        Permission::create(['name' => 'postinganadmin.edit']);
        Permission::create(['name' => 'postinganadmin.destroy']);

        //role
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.destroy']);
        Permission::create(['name' => 'role.import']);
        Permission::create(['name' => 'role.export']);

        //permission
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.destroy']);
        Permission::create(['name' => 'permission.import']);
        Permission::create(['name' => 'permission.export']);

        //assignpermission
        Permission::create(['name' => 'assign.index']);
        Permission::create(['name' => 'assign.create']);
        Permission::create(['name' => 'assign.edit']);
        Permission::create(['name' => 'assign.destroy']);

        //assingusertorole
        Permission::create(['name' => 'assign.user.index']);
        Permission::create(['name' => 'assign.user.create']);
        Permission::create(['name' => 'assign.user.edit']);

        //menu group
        Permission::create(['name' => 'menu-group.index']);
        Permission::create(['name' => 'menu-group.create']);
        Permission::create(['name' => 'menu-group.edit']);
        Permission::create(['name' => 'menu-group.destroy']);

        //menu item
        Permission::create(['name' => 'menu-item.index']);
        Permission::create(['name' => 'menu-item.create']);
        Permission::create(['name' => 'menu-item.edit']);
        Permission::create(['name' => 'menu-item.destroy']);

        //menu kelurahan
        Permission::create(['name' => 'kelurahan.index']);
        Permission::create(['name' => 'kelurahan.create']);
        Permission::create(['name' => 'kelurahan.edit']);
        Permission::create(['name' => 'kelurahan.destroy']);

        //menu kecamatan
        Permission::create(['name' => 'kecamatan.index']);
        Permission::create(['name' => 'kecamatan.create']);
        Permission::create(['name' => 'kecamatan.edit']);
        Permission::create(['name' => 'kecamatan.destroy']);

        //menu kategori
        Permission::create(['name' => 'kategori.index']);
        Permission::create(['name' => 'kategori.create']);
        Permission::create(['name' => 'kategori.edit']);
        Permission::create(['name' => 'kategori.destroy']);

        //menu lowongan pekerjaan
        Permission::create(['name' => 'loker.index']);
        Permission::create(['name' => 'loker.create']);
        Permission::create(['name' => 'loker.edit']);
        Permission::create(['name' => 'loker.destroy']);

        //menu pelamar (perusahaan)
        Permission::create(['name' => 'pelamarkerja.index']);
        Permission::create(['name' => 'pelamarkerja.create']);
        Permission::create(['name' => 'pelamarkerja.edit']);
        Permission::create(['name' => 'pelamarkerja.destroy']);

        //menu keahlian
        Permission::create(['name' => 'keahlian.index']);
        Permission::create(['name' => 'keahlian.create']);
        Permission::create(['name' => 'keahlian.edit']);
        Permission::create(['name' => 'keahlian.destroy']);

        //loker-perusahaan
        Permission::create(['name' => 'loker-perusahaan.index']);
        Permission::create(['name' => 'loker-perusahaan.show']);
        Permission::create(['name' => 'loker-perusahaan.create']);
        Permission::create(['name' => 'loker-perusahaan.edit']);

        //lamar-perusahaan
        Permission::create(['name' => 'lamarperusahaan.index']);
        Permission::create(['name' => 'lamarperusahaan.show']);
        Permission::create(['name' => 'lamarperusahaan.edit']);

        //bookmarks
        Permission::create(['name' => 'bookmarks.index']);

        //status-lamaran
        Permission::create(['name' => 'status-lamaran.index']);

        // create roles
        $roleUser = Role::create(['name' => 'Pencari Kerja']);
        $roleUser->givePermissionTo([
            'dashboard',
            'user.index',
            'bookmarks.index',
            'status-lamaran.index',
        ]);

        // create roles
        $roleUser = Role::create(['name' => 'Perusahaan']);
        $roleUser->givePermissionTo([
            'dashboard',
            'menu.pekerjaan',
            'loker.index',
            'loker.create',
            'loker.edit',
            'loker.destroy',
            'pelamarkerja.index',
            'pelamarkerja.create',
            'pelamarkerja.edit',
            'pelamarkerja.destroy',
            'loker-perusahaan.index',
            'loker-perusahaan.show',
            'loker-perusahaan.create',
            'loker-perusahaan.edit',
            'lamarperusahaan.index',
            'lamarperusahaan.show',
            'lamarperusahaan.edit',
        ]);

        // create Super Admin
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        //assign user id 1 ke super admin
        $user = User::find(1);
        $user->assignRole('super-admin');
        $user = User::find(3);
        $user->assignRole('Pencari Kerja');
        $user = User::find(4);
        $user->assignRole('Perusahaan');
    }
}
