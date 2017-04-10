<?php

use Illuminate\Database\Seeder;

class PessoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pessoa::class, 100)->create();
        // DB::table('pessoas')->insert([
        //     'nome' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'telefone' => str_random(8),
        //     'dtnasc' => '2018-10-10'
        // ]);
    }
}
