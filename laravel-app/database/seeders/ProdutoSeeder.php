<?php

namespace Database\Seeders;

use App\Models\Produto;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 100; $i++) {
            Produto::create([
                'nome' => $faker->words(2, true),
                'descricao' => $faker->sentence,
                'preco' => $faker->randomFloat(2, 10, 1000),
                'quantidade' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
