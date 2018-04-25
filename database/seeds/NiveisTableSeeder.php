<?php

use Illuminate\Database\Seeder;

class NiveisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveis')->insert([
            'id' => 1,
            'nome' => 'Técnico'
        ]);
        DB::table('niveis')->insert([
            'id' => 2,
            'nome' => 'Graduação'
        ]);
        DB::table('niveis')->insert([
            'id' => 3,
            'nome' => 'Pós-graduação'
        ]);
        DB::table('niveis')->insert([
            'id' => 4,
            'nome' => 'Extensão'
        ]);

        DB::table('niveis')->insert([
            'id' => 5,
            'pai_id' => 1,
            'nome' => 'Integrado ao Ensino Médio'
        ]);
        DB::table('niveis')->insert([
            'id' => 6,
            'pai_id' => 1,
            'nome' => 'Subsequente ao Ensino Médio'
        ]);
        DB::table('niveis')->insert([
            'id' => 7,
            'pai_id' => 1,
            'nome' => 'Concomitante ao Ensino Médio'
        ]);
        DB::table('niveis')->insert([
            'id' => 8,
            'pai_id' => 1,
            'nome' => 'Educação de Jovens e Adultos (EJA)'
        ]);

        DB::table('niveis')->insert([
            'id' => 9,
            'pai_id' => 2,
            'nome' => 'Tecnologia'
        ]);
        DB::table('niveis')->insert([
            'id' => 10,
            'pai_id' => 2,
            'nome' => 'Bacharelado'
        ]);
        DB::table('niveis')->insert([
            'id' => 11,
            'pai_id' => 2,
            'nome' => 'Licenciatura'
        ]);

        DB::table('niveis')->insert([
            'id' => 12,
            'pai_id' => 3,
            'nome' => 'Especialização'
        ]);
        DB::table('niveis')->insert([
            'id' => 13,
            'pai_id' => 3,
            'nome' => 'Mestrado Profissional'
        ]);

        DB::table('niveis')->insert([
            'id' => 14,
            'pai_id' => 4,
            'nome' => 'Curso de Extensão'
        ]);
    }
}
