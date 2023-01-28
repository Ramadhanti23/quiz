<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('orders')->insert([
            'user' => 'client',
            'product' => 'baju',
            'total' => '50000',
            'status' => 'pending',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
