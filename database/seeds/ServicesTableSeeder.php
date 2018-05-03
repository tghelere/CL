<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    private $service_title = ['Limpeza', 'Serviços Gerais', 'Portaria', 'Jardinagem', 'Recepção', 'Controladoria de acesso'];
    private $service_slug = ['servicos-limpeza', 'servicos-servicos-gerais', 'servicos-portaria', 'servicos-jardinagem', 'servicos-recepcao', 'servicos-controladoria-de-acesso'];
    private $service_url = ['servicos/limpeza', 'servicos/servicos-gerais', 'servicos/portaria', 'servicos/jardinagem', 'servicos/recepcao', 'servicos/controladoria-de-acesso'];
    private $service_description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit autem nihil tempora, odio reiciendis, sint quisquam cum quaerat blanditiis laborum culpa at quas mollitia maxime. Culpa enim quisquam dolores distinctio?";
    private $service_icon = ['serv_limpeza.png', 'serv_servicos-gerais.png', 'serv_portaria.png', 'serv_jardinagem.png', 'serv_recepcao.png', 'serv_controlatoria.png'];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Service::truncate();

        for ($i=0; $i <= 5; $i++) { 
            Service::create([
                'slug'  => $this->service_slug[$i],
                'title' => $this->service_title[$i],
                'url' => $this->service_url[$i],
                'description' => $this->service_description,
                'icon' => $this->service_icon[$i]
            ]);
        }
    }
}
