<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        State::truncate();
        Schema::enableForeignKeyConstraints();

        State::insert([
            [
                "id"         => 1,
                "name"       => "Rondônia",
                "abbr"       => "RO",
            ], [
                "id"         => 2,
                "name"       => "Acre",
                "abbr"       => "AC",
            ], [
                "id"         => 3,
                "name"       => "Amazonas",
                "abbr"       => "AM",
            ], [
                "id"         => 4,
                "name"       => "Roraima",
                "abbr"       => "RR",
            ], [
                "id"         => 5,
                "name"       => "Pará",
                "abbr"       => "PA",
            ], [
                "id"         => 6,
                "name"       => "Amapá",
                "abbr"       => "AP",
            ], [
                "id"         => 7,
                "name"       => "Tocantins",
                "abbr"       => "TO",
            ], [
                "id"         => 8,
                "name"       => "Maranhão",
                "abbr"       => "MA",
            ], [
                "id"         => 9,
                "name"       => "Piauí",
                "abbr"       => "PI",
            ], [
                "id"         => 10,
                "name"       => "Ceará",
                "abbr"       => "CE",
            ], [
                "id"         => 11,
                "name"       => "Rio Grande do Norte",
                "abbr"       => "RN",
            ], [
                "id"         => 12,
                "name"       => "Paraíba",
                "abbr"       => "PB",
            ], [
                "id"         => 13,
                "name"       => "Pernambuco",
                "abbr"       => "PE",
            ], [
                "id"         => 14,
                "name"       => "Alagoas",
                "abbr"       => "AL",
            ], [
                "id"         => 15,
                "name"       => "Sergipe",
                "abbr"       => "SE",
            ], [
                "id"         => 16,
                "name"       => "Bahia",
                "abbr"       => "BA",
            ], [
                "id"         => 17,
                "name"       => "Minas Gerais",
                "abbr"       => "MG",
            ], [
                "id"         => 18,
                "name"       => "Espírito Santo",
                "abbr"       => "ES",
            ], [
                "id"         => 19,
                "name"       => "Rio de Janeiro",
                "abbr"       => "RJ",
            ], [
                "id"         => 20,
                "name"       => "São Paulo",
                "abbr"       => "SP",
            ], [
                "id"         => 21,
                "name"       => "Paraná",
                "abbr"       => "PR",
            ], [
                "id"         => 22,
                "name"       => "Santa Catarina",
                "abbr"       => "SC",
            ], [
                "id"         => 23,
                "name"       => "Rio Grande do Sul",
                "abbr"       => "RS",
            ], [
                "id"         => 24,
                "name"       => "Mato Grosso do Sul",
                "abbr"       => "MS",
            ], [
                "id"         => 25,
                "name"       => "Mato Grosso",
                "abbr"       => "MT",
            ], [
                "id"         => 26,
                "name"       => "Goiás",
                "abbr"       => "GO",
            ], [
                "id"         => 27,
                "name"       => "Distrito Federal",
                "abbr"       => "DF",
            ],
        ]);
    }
}
