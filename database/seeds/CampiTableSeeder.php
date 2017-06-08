<?php

use Illuminate\Database\Seeder;

class CampiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campi')->insert([
            'id' => 1,
            'nome' => 'Reitoria'
        ]);
        DB::table('campi')->insert([
            'id' => 2,
            'nome' => 'Alvorada'
        ]);
        DB::table('campi')->insert([
            'id' => 3,
            'nome' => 'Bento Gonçalves'
        ]);
        DB::table('campi')->insert([
            'id' => 4,
            'nome' => 'Canoas'
        ]);
        DB::table('campi')->insert([
            'id' => 5,
            'nome' => 'Caxias do Sul'
        ]);
        DB::table('campi')->insert([
            'id' => 6,
            'nome' => 'Erechim'
        ]);
        DB::table('campi')->insert([
            'id' => 7,
            'nome' => 'Farroupilha'
        ]);
        DB::table('campi')->insert([
            'id' => 8,
            'nome' => 'Feliz'
        ]);
        DB::table('campi')->insert([
            'id' => 9,
            'nome' => 'Ibirubá'
        ]);
        DB::table('campi')->insert([
            'id' => 10,
            'nome' => 'Osório'
        ]);
        DB::table('campi')->insert([
            'id' => 11,
            'nome' => 'Porto Alegre'
        ]);
        DB::table('campi')->insert([
            'id' => 12,
            'nome' => 'Restinga'
        ]);
        DB::table('campi')->insert([
            'id' => 13,
            'nome' => 'Rio Grande'
        ]);
        DB::table('campi')->insert([
            'id' => 14,
            'nome' => 'Rolante'
        ]);
        DB::table('campi')->insert([
            'id' => 15,
            'nome' => 'Sertão'
        ]);
        DB::table('campi')->insert([
            'id' => 16,
            'nome' => 'Vacaria'
        ]);
        DB::table('campi')->insert([
            'id' => 17,
            'nome' => 'Veranópolis'
        ]);
        DB::table('campi')->insert([
            'id' => 18,
            'nome' => 'Viamão'
        ]);
    }
}
