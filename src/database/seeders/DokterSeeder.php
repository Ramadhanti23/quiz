<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('dokters')->insert([
            'nama' => ' DR JOHNNY SUH',
            'spesialis' => ' GIGI ',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
