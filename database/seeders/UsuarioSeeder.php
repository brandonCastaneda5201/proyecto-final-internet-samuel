<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->unverified()->withPersonalTeam()->create([
            'name' => 'Brandon C.',
            'email' => 'testeo1234@testeo1234.com',
        ]);
    }
}
