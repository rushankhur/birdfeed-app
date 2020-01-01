<?php

use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cosmo',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css',
            'description' => 'An ode to Metro',
            'is_default' => '1'
        ]);
        DB::table('themes')->insert([
            'name' => 'Darkly',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css',
            'description' => 'Night mode',
            'is_default' => '0'
        ]);
        DB::table('themes')->insert([
            'name' => 'Minty',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/minty/bootstrap.min.css',
            'description' => 'A fresh feel',
            'is_default' => '0'
        ]);
        DB::table('themes')->insert([
            'name' => 'Journal',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/journal/bootstrap.min.css',
            'description' => 'Crisp like a new sheet of paper',
            'is_default' => '0'
        ]);
        DB::table('themes')->insert([
            'name' => 'Sketchy',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/sketchy/bootstrap.min.css',
            'description' => 'A hand-drawn look',
            'is_default' => '0'
        ]);
        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cyborg/bootstrap.min.css',
            'description' => 'Jet black and electric blue',
            'is_default' => '0'
        ]);

    }
}
