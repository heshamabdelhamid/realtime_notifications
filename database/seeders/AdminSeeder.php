<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Admin::updateOrCreate(['email' => 'admin@admin.com'], [
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => '12345678',
            'type'     => 'super_admin',
        ]);
    }
}
