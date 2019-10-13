<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => "Blog Edu",
            'address' => 'Hanoi',
            'contact_number' => '0368 616 260',
            'contact_email' => 'linhdn1198@gmail.com'
        ]);
    }
}
