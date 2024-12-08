<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UpdateUserPasswordSeeder extends Seeder
{
    public function run()
    {
        User::where('anindyavivia215@gmail.com')->update([
            'password' => bcrypt('098762407'),
        ]);
    }
}
