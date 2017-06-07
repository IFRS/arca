<?php

use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turnos')->insert([
            'id' => 1,
            'nome' => 'Manhã'
        ]);
        DB::table('turnos')->insert([
            'id' => 2,
            'nome' => 'Tarde'
        ]);
        DB::table('turnos')->insert([
            'id' => 3,
            'nome' => 'Noite'
        ]);
    }
}
