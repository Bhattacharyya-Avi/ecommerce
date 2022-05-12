<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name'=>'ecommerce',
            'email'=>'ecommerce@gmail.com',
            'address'=>'Bangladesh',
            'about'=>'a ecommerce site',
            'slogan'=>'selling goods',
            'facebook'=>'www.facebook.com',
            'instragram'=>'www.instragram.com',
            'contact'=>'01737352441'
        ]);
    }
}
