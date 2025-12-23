<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserLoginAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_app')->insert([
            'fullname' => 'Administrador Plataforma',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('priority')->insert([
            ['type' => 'Urgente', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Alta', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Media', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Baja', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('tasks')->insert([
            'user_id' => 1,
            'title' => 'Tarea de Prueba',
            'description' => 'Esta es una tarea de prueba',
            'due_date' => now(),
            'priority_id' => 2,
            'state' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
