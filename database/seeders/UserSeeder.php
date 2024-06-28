<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = new User();
        $user->name = 'administrator';
        $user->email = 'administrator@mail.com';
        $user->password = bcrypt('123123');
        $user->save();

        $bus = new JenisKendaraan();
        $bus->jenis_kendaraan = StrToUpper('bus & elf');
        $bus->save();

        $roda2 = new JenisKendaraan();
        $roda2->jenis_kendaraan = StrToUpper('roda2');
        $roda2->save();

        $roda4 = new JenisKendaraan();
        $roda4->jenis_kendaraan = StrToUpper('roda4');
        $roda4->save();

        $perlengkapan = new JenisKendaraan();
        $perlengkapan->jenis_kendaraan = StrToUpper('perlengkapan');
        $perlengkapan->save();
    }
}
