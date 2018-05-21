<?php

use App\Models\Content;
use App\Models\Service;
use App\Models\Solution;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Content::truncate();

        $pages = ['home', 'quem-somos', 'contato', 'blog', 'ouvidoria', 'trabalhe-conosco', 'footer', 'home-testimonies', 'home-solutions'];
        $services_pages = Service::all()->pluck('slug')->toArray();
        $solutions_pages = Solution::all()->pluck('slug')->toArray();

        $pages = array_merge($pages, $services_pages, $solutions_pages);

        $content = [
            // home
            '<p>Fundada em 1997 em Londrina, Paran&aacute;, a Centrallimp proporciona qualidade de vida para seus clientes. Com a gest&atilde;o de pessoas da Centrallimp voc&ecirc; encontra solu&ccedil;&otilde;es integradas para sua empresa. O investimento continuado em capacita&ccedil;&atilde;o e novas tecnologias se traduzem em profissionais mais capacitados a atender &agrave;s diversas demandas de seus clientes.</p>',
            
            // quem-somos
            '<p>A Centrallimp iniciou suas atividades em 1997, atendendo as necessidades de empresas nas &aacute;reas de limpeza, conserva&ccedil;&atilde;o e portaria, al&eacute;m de outros servi&ccedil;os ligados &agrave; manuten&ccedil;&atilde;o predial.</p>
            <p>Com sede na cidade de Londrina no Paran&aacute;, ainda possui escrit&oacute;rios regionais em Minas Gerais e Mato Grosso do Sul.</p>            
            <p>Possui opera&ccedil;&otilde;es nas regi&otilde;es sul, sudeste, centro-oeste e norte do pa&iacute;s, al&eacute;m de uma equipe de supervisores altamente capacitados para atender os projetos de forma personalizada de acordo com as necessidades de cada cliente.</p>',

            // contato
            '<p>Se voc&ecirc; deseja entrar em contato com a Centrallimp para enviar sugest&otilde;es ou obter informa&ccedil;&otilde;es complementares da Empresa, utilize o formul&aacute;rio abaixo.</p>',

            // blog
            'blog',

            // ouvidoria
            '<p>Para entrar em contato conosco para enviar cr&iacute;ticas, sugest&otilde;es ou obter informa&ccedil;&otilde;es complementares da empresa, preencha corretamente o formul&aacute;rio abaixo.</p>',

            // trabalhe-conosco
            '<p>Profissionais qualificados, preocupados com o autodesenvolvimento e comprometidos com os ideais da empresa. Este &eacute; o perfil que a Centrallimp procura e investe para o crescimento na carreira. Preencha seus dados e participe de processos de sele&ccedil;&atilde;o:</p>',

            // footer
            '<p>Especialistas em diminuir custos e melhorar a produtividade de empresas e condom&iacute;nios.</p>',

            // home-testimonies
            '<p>A satisfa&ccedil;&atilde;o de nossos clientes s&atilde;o os nossos melhores indicadores de qualidade. Estamos sempre atentos &agrave;s suas necessidades, comprometidos com excel&ecirc;ncia nos servi&ccedil;os prestados.</p>',

            // home-solutions
            '<p>Oferecemos equipes especializadas em diversas &aacute;reas de atua&ccedil;&atilde;o. Entre em contato e conhe&ccedil;a as solu&ccedil;&otilde;es diferenciadas que a Centrallimp tem pra voc&ecirc;.</p>',


            // servicos-limpeza
            '<p>Com equipamentos de &uacute;ltima gera&ccedil;&atilde;o, a Centrallimp possui uma equipe altamente capacitada, comprometida com m&eacute;todos inteligentes e eficazes de limpeza sob a supervis&atilde;o de uma lideran&ccedil;a de ponta. Contamos solu&ccedil;&otilde;es personalizadas de acordo com a estrutura f&iacute;sica de cada cliente, garantindo qualidade na limpeza dos diferentes ambientes e necessidades.&nbsp;</p>
            <ul>
                <li>Limpeza profissional especializada em vidros, pisos, paredes e demais instala&ccedil;&otilde;es;</li>
                <li>Especificidade em normas e exig&ecirc;ncias de cl&iacute;nicas e &aacute;reas da sa&uacute;de.</li>
                <li>Prontos para atender diversos segmentos.</li>
            </ul>',
            // servicos-portaria
            '<p>Em empresas e condom&iacute;nios, a Centrallimp conta com profissionais qualificados a receber bem e com seguran&ccedil;a os seus moradores e visitantes, al&eacute;m de pr&aacute;ticas especializadas que garantem o m&aacute;ximo de seguran&ccedil;a.</p>
            <ul>
                <li>Implanta&ccedil;&atilde;o e execu&ccedil;&atilde;o de procedimentos de recebimentos;</li>
                <li>Gest&atilde;o de seguran&ccedil;a garantida cumprindo prazos dentro de diferentes perfis de empresas e condom&iacute;nios;</li>
                <li>Solu&ccedil;&otilde;es inovadoras e inteligentes que garantem qualidade de um bom atendimento.</li>
            </ul>',
            // servicos-jardinagem
            '<p>Preparada para os mais variados ambientes e espa&ccedil;os dos segmentos atendidos, a Centrallimp oferece a seus clientes as mais variadas solu&ccedil;&otilde;es em jardinagem, com m&eacute;todos eficazes de conserva&ccedil;&atilde;o das &aacute;reas verdes.</p>
            <ul>
                <li>Manuten&ccedil;&atilde;o e conserva&ccedil;&atilde;o de jardins;</li>
                <li>Utiliza&ccedil;&atilde;o adequada de produtos e equipamentos;</li>
                <li>Elimina&ccedil;&atilde;o de doen&ccedil;as e ervas daninhas;</li>
                <li>Poda educativa.</li>
            </ul>',
            // servicos-recepcao
            '<p>Garantindo normas e procedimentos de cada cliente, a Centrallimp conta com atendimento de forma segura e profissional na recep&ccedil;&atilde;o de empresas e condom&iacute;nios, al&eacute;m de garantir bom atendimento a seus clientes e colaboradores.</p>
            <ul>
                <li>Padroniza&ccedil;&atilde;o de atendimento;</li>
                <li>Procedimentos adequados no recebimento, cadastramento e direcionamento das visitas;</li>
                <li>Garantia da organiza&ccedil;&atilde;o e seguran&ccedil;a dos trabalhos internos.</li>
            </ul>',
            // servicos-controladoria-de-acesso
            '<p>Para garantir a seguran&ccedil;a e o controle adequado do acesso &agrave;s institui&ccedil;&otilde;es, este profissional &eacute; o respons&aacute;vel por coordenar o fluxo de pessoas, acessos de ve&iacute;culos e o melhor atendimento ao p&uacute;blico. Suas a&ccedil;&otilde;es est&atilde;o aliadas com tecnologias que garantem a excel&ecirc;ncia nos servi&ccedil;os prestados em locais de grande fluxo de funcion&aacute;rios, fornecedores, prestadores de servi&ccedil;os, visitantes e moradores.</p>
            <ul>
                <li>Fiscaliza&ccedil;&atilde;o;</li>
                <li>Padroniza&ccedil;&atilde;o de atendimento;</li>
                <li>Tecnologia e efic&aacute;cia no controle fluxo.</li>
            </ul>',

            // solucoes-industrias
            '<p>Capacidade t&eacute;cnica e profissional para atender diversos tipos de ambientes industriais.</p>
            <ul>
                <li>Limpeza e manuten&ccedil;&atilde;o para piso ep&oacute;xi;</li>
                <li>Equipamentos de alta performance para &aacute;reas externas;</li>
                <li>Profissionais capacitados para manuten&ccedil;&atilde;o de jardins;</li>
                <li>Vidros e fachadas;</li>
                <li>Limpeza das &aacute;reas administrativas;</li>
                <li>Profissionais treinados para atuar em portaria e recep&ccedil;&atilde;o.</li>
            </ul>
            <p><strong>VAREJO</strong></p>
            <p>Profissionais capacitados nos cuidados extras exigidos na limpeza de empresas de varejo&nbsp;</p>
            <ul>
                <li>Limpeza de g&ocirc;ndolas e prateleiras;</li>
                <li>&Aacute;reas administrativas;</li>
                <li>Vidros e fachadas;</li>
                <li>&Aacute;reas externas e jardins.</li>
            </ul>',
            // solucoes-comercio
            'solucoes-comercio',
            // solucoes-orgaos-publicos
            '<p>Transpar&ecirc;ncia e capacidade t&eacute;cnica para atuar em diversos &oacute;rg&atilde;os municipais, estaduais e federais.</p>
            <ul>
                <li>Equipamentos profissionais de limpeza</li>
                <li>F&aacute;brica pr&oacute;pria de produtos de limpeza&nbsp;</li>
                <li>Profissional de Portaria, Recep&ccedil;&atilde;o, Jardinagem, Controlador de Acesso e Limpeza</li>
                <li>Projetos personalizados de acordo com a necessidade de cada cliente</li>
            </ul>',
            // solucoes-condominios
            '<p>Limpeza de &aacute;reas comuns e portarias administradas com profissionalismo e transpar&ecirc;ncia.</p>
            <ul>
                <li>Limpeza de Halls, corredores, escadas e elevadores;</li>
                <li>Profissionais treinados para atuar em portaria;</li>
                <li>Jardinagem e &aacute;reas externas.</li>
            </ul>',
            // solucoes-clinicas-e-hospitais
            '<p>Investimento cont&iacute;nuo em capacita&ccedil;&atilde;o e novas tecnologias se traduz em profissionais mais capacitados a atender as diversas demandas dos clientes Centrallimp.</p>
            <p>Especializa&ccedil;&otilde;es necess&aacute;rias para manter em funcionamento a estrutura f&iacute;sica de edif&iacute;cios de cl&iacute;nicas e &aacute;reas da sa&uacute;de.&nbsp;</p>
            <ul>
                <li>Capacita&ccedil;&atilde;o t&eacute;cnica especializada;</li>
                <li>Procedimentos adequados;</li>
                <li>Capacidade t&eacute;cnica para atendimento em cl&iacute;nicas de especialidades, odontol&oacute;gicas e veterin&aacute;rias.</li>
            </ul>',
            // solucoes-escolas-e-universidades
            '<p>Equipamentos e produtos de limpeza de alta performance para ambientes de grande circula&ccedil;&atilde;o.</p>
            <ul>
                <li>P&aacute;tios;</li>
                <li>Salas de aula;</li>
                <li>Administrativo;</li>
                <li>Jardins;</li>
                <li>Quadras poliesportivas;</li>
                <li>&Aacute;reas de lazer;</li>
                <li>Banheiros.</li>
            </ul>',
            // solucoes-escritorios-e-ambientes-corporativos
            '<p>Seguran&ccedil;a e efici&ecirc;ncia na limpeza de ambientes delicados e formais, por meio de t&eacute;cnicas e profissionais aptos para tais condi&ccedil;&otilde;es.&nbsp;</p>
            <ul>
                <li>Cuidados com a limpeza de computadores e equipamentos eletr&ocirc;nicos</li>
                <li>Adquada higieniza&ccedil;&atilde;o de banheiros</li>
                <li>Profissional de recep&ccedil;&atilde;o, limpeza e copa</li>
                <li>Produtos de limpeza espec&iacute;ficos para &aacute;reas internas</li>
            </ul>',
        ];

        foreach ($pages as $key => $value) {
            Content::create([
                'page' => $value,
                'content' => $content[$key],
            ]);
        }

    }
}
