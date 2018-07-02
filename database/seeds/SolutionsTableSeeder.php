<?php

use Illuminate\Database\Seeder;
use App\Models\Solution;

class SolutionsTableSeeder extends Seeder
{
    private $solution_slug = ['industrias', 'varejo', 'orgaos-publicos', 'condominios', 'clinicas-e-areas-de-saude', 'escolas-e-universidades', 'escritorios-e-ambientes-corporativos'];
    private $solution_title = ['Indústrias', 'Varejo', 'Orgãos públicos', 'Condomínios', 'Clínicas e Áreas de Saúde', 'Escolas e Universidades', 'Escritórios e Ambientes Corporativos'];
    private $solution_description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit autem nihil tempora, odio reiciendis, sint quisquam cum quaerat blanditiis laborum culpa at quas mollitia maxime. Culpa enim quisquam dolores distinctio?";
    private $solution_thumb = ['solution_industrias.png', 'solution_varejo.png', 'solution_orgaos-publicos.png', 'solution_condominios.png', 'solution_clinicas-e-hospitais.png', 'solution_escolas-e-universidades.png', 'solution_escritorios-e-ambientes-corporativos.png'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Solution::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i <= 6; $i++) { 
            Solution::create([
                'slug'  => $this->solution_slug[$i],
                'title' => $this->solution_title[$i],
                'description' => $this->solution_description,
                'thumb' => $this->solution_thumb[$i]
            ]);
        }
    }
}
