<?php

use Illuminate\Database\Seeder;
use App\Models\Testimony;

class TestimoniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::truncate();

        Testimony::create([
            'name' => 'Ir. Rosa Maria Ruthes',
            'institute' => 'Gestora Educacional - Colégio Mãe de Deus',
            'sequence' => '1',
            'testimony' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/5agZ0p60ZSw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        ]);

        Testimony::create([
            'name' => 'Roberto Balciunas',
            'institute' => 'Gerente de Qualidade',
            'sequence' => '2',
            'testimony' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/urn8ADjiyfY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        ]);

        // factory(Testimony::class)->times(5)->create();
    }
}
