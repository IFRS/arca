<?php

use Illuminate\Database\Seeder;

class ModalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidades')->insert([
            'id' => 1,
            'nome' => 'Presencial'
        ]);
        DB::table('modalidades')->insert([
            'id' => 2,
            'nome' => 'Educação a Distância (EaD)'
        ]);
    }
}
