<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Profil;
use App\Models\JenisKendaraan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SuperAdminRole = new Role();
        $SuperAdminRole->name = "superadmin";
        $SuperAdminRole->display_name = "superadmin";
        $SuperAdminRole->save();

        $AdminRole = new Role();
        $AdminRole->name = "admin";
        $AdminRole->display_name = "admin";
        $AdminRole->save();

        $BendaharaRole = new Role();
        $BendaharaRole->name = "bendahara";
        $BendaharaRole->display_name = "bendahara";
        $BendaharaRole->save();

        $user = new User();
        $user->name = 'administrator';
        $user->email = 'administrator@mail.com';
        $user->password = bcrypt('123123');
        $user->save();
        $user->addRole($AdminRole);

        $profiluser = new Profil();
        $profiluser->nama_profil = 'administrator';
        $profiluser->email = 'administrator@mail.com';
        $profiluser->save();

        $superadmin = new User();
        $superadmin->name = 'superadmin';
        $superadmin->email = 'superadmin@mail.com';
        $superadmin->password = bcrypt('123123');
        $superadmin->save();
        $superadmin->addRole($SuperAdminRole);

        $superadminprofil = new Profil();
        $superadminprofil->nama_profil = 'superadmin';
        $superadminprofil->email = 'superadmin@mail.com';
        $superadminprofil->save();

        $bus = new JenisKendaraan();
        $bus->jenis_kendaraan = StrToUpper('bus & elf');
        $bus->save();

        $roda2 = new JenisKendaraan();
        $roda2->jenis_kendaraan = StrToUpper('roda 2');
        $roda2->save();

        $roda4 = new JenisKendaraan();
        $roda4->jenis_kendaraan = StrToUpper('roda 4');
        $roda4->save();
    }
}
