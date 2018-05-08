<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'AdminCentrallimp',

    'title_prefix' => 'AdminCentrallimp',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Admin</b>Centrallimp',

    'logo_mini' => '<b>Adm</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'PÁGINAS DO SITE',
        [
            'text' => 'Home',
            'url'  => 'admin/home',
            'icon' => 'home',
        ],
        [
            'text' => 'Quem Somos',
            'url'  => 'admin/quem-somos',
            'icon' => 'id-card',
        ],
        [
            'text' => 'Trabalhe Conosco',
            // 'url'  => 'admin/trabalhe-conosco',
            'icon' => 'users',
            'submenu' => [
                [
                    'text'  =>  'Página',
                    'url'   =>  'admin/trabalhe-conosco/pagina',
                    'icon'  =>  'edit',
                ],
                [
                    'text'  =>  'Recrutamento',
                    'url'   =>  'admin/trabalhe-conosco/recrutamento',
                    'icon' => 'envelope-open',
                    'label' => 6,
                    'label_color' => 'primary',
                ],
            ],
        ],
        [
            'text' => 'Contato',
            // 'url'  => 'admin/contato',
            'icon' => 'envelope',
            'submenu' => [
                [
                    'text'  =>  'Página',
                    'url'   =>  'admin/contato/pagina',
                    'icon'  =>  'edit',
                ],
                [
                    'text'  =>  'Mensagens',
                    'url'   =>  'admin/contato/mensagens',
                    'icon' => 'envelope-open',
                    'label' => 2,
                    'label_color' => 'primary',
                ],
            ],
        ],
        [
            'text' => 'Ouvidoria',
            // 'url'  => 'admin/ouvidoria',
            'icon' => 'comment',
            'submenu' => [
                [
                    'text'  =>  'Página',
                    'url'   =>  'admin/ouvidoria/pagina',
                    'icon'  =>  'edit',
                ],
                [
                    'text'  =>  'Mensagens',
                    'url'   =>  'admin/ouvidoria/mensagens',
                    'icon' => 'envelope-open',
                    'label' => 12,
                    'label_color' => 'primary',
                ],
            ],
        ],
        [
            'text' => 'Serviços',
            'url'  => 'admin/servicos',
            'icon' => 'tasks',
            'submenu' => [
                [
                    'text' => 'Limpeza',
                    'url'  => 'admin/servicos/limpeza',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Serviços Gerais',
                    'url'  => 'admin/servicos/servicos-gerais',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Portaria',
                    'url'  => 'admin/servicos/portaria',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Jardinagem',
                    'url'  => 'admin/servicos/jardinagem',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Recepção',
                    'url'  => 'admin/servicos/recepcao',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Controladoria de Acesso',
                    'url'  => 'admin/servicos/controladoria-de-acesso',
                    'icon'  =>  'hand-o-right',
                ],
            ],
        ],
        [
            'text' => 'Soluções',
            'url'  => 'admin/solucoes',
            'icon' => 'building',
            'submenu' => [
                [
                    'text' => 'Indústrias',
                    'url'  => 'admin/solucoes/industrias',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Comércio',
                    'url'  => 'admin/solucoes/comercio',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Orgãos Públicos',
                    'url'  => 'admin/solucoes/orgaos-publicos',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Condomínios',
                    'url'  => 'admin/solucoes/condominios',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Clínicas e Hospitais',
                    'url'  => 'admin/solucoes/clinicas-e-hospitais',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Escolas e Universidades',
                    'url'  => 'admin/solucoes/escolas-e-universidades',
                    'icon'  =>  'hand-o-right',
                ],
                [
                    'text' => 'Escritórios e Ambientes Corp.',
                    'url'  => 'admin/solucoes/escritorios-e-ambientes-corporativos',
                    'icon'  =>  'hand-o-right',
                ],
            ],
            
        ],
        [
            'text' => 'Blog',
            'url'  => 'admin/blog',
            'icon' => 'pencil'
        ],
        [
            'text' => 'Newsletter',
            'url'  => 'admin/newsletter',
            'icon' => 'at',
            'label' => 1, 
            'label_color' => 'warning',
        ],
        [
            'text' => 'Orçamentos',
            'url'  => 'admin/orcamento',
            'icon' => 'briefcase',
            'label' => 4,
            'label_color' => 'danger',
        ],
        [
            'text' => 'Rodapé',
            'url'  => 'admin/rodape',
            'icon' => 'level-down',
        ],
        // 'Informações',
        // [
        //     'text'       => 'Telefones',
        //     'icon_color' => 'red',
        //     'icon' => 'phone',
        // ],
        // [
        //     'text'       => 'Localização',
        //     'icon_color' => 'green',
        //     'icon' => 'map',
        // ],
        // [
        //     'text'       => 'Redes Sociais',
        //     'icon_color' => 'aqua',
        //     'icon' => 'link'
        // ],
        // 'Configurações da conta',
        // [
        //     'text' => 'Perfil',
        //     'url'  => 'admin/settings',
        //     'icon' => 'user',
        // ],
        // [
        //     'text' => 'Alterar Password',
        //     'url'  => 'admin/settings',
        //     'icon' => 'lock',
        // ],        
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
