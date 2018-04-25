<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TurnosTableSeeder::class);
        $this->call(ModalidadesTableSeeder::class);
        $this->call(NiveisTableSeeder::class);
        $this->call(CampiTableSeeder::class);
    }
}
