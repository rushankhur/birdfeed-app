<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Southern Brown Kiwi',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/e8ed07f0ad01c4d5374d87090c2d2cb5/854d8/southern-brown-kiwi-tokoeka-steart-island-alina-thiebes.jpg',
            'content' => 'These kiwis have found their home in the steep terrain and frequently cold...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'Fantail',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/b6d51aae51a448dcc842f693db898f00/854d8/Fantail_2.jpg',
            'content' => 'Their charm won us over by being indifferent towards humans as we ...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'Antipodean Albatross',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/a5379aa651fa25f2fb157fc2b434be9d/c60fc/Antipodean%2520albatross%2520couple_0.png',
            'content' => 'They spend most of their lives at sea, only coming on land to raise young every two ...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'New Zealand Robin',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/ff1441c50781aff6a367d4a3f7e179ae/854d8/NZ%2520Robin-3.jpg',
            'content' => 'The New Zealand robin has a grey-white patch of feathers above its beak that ...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'Black-billed Gull',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/fb63a5c90a602d523093a5f01beee49f/9873a/Black-billed%2520Gull.jpg',
            'content' => 'The black-billed gull is the most endangered gull in the world. Although it ...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'Brown Teal',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/8a7f7398e13f133f82e4f68b71a2f950/378be/Brown%2520Teal_2.jpg',
            'content' => 'This little brown duck has gone from being "nationally endangered" to "recovering".',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'Grey Warbler',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/208869d60b5b8f295d121ae7bda262fc/2e60b/grey%2520warbler%25202.jpg',
            'content' => 'Keeping themselves busy by dancing in the canopy looking for small invertebrates ...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'Bellbird',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/59b3ac16800b21f2abfbaf41327b5c2f/9873a/bellbird.jpg',
            'content' => 'The bellbird is a musical wonder. It produces the sound of a thousand tiny ...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'Shore Plover',
            'image_url' => 'https://www.birdoftheyear.org.nz/static/92945b9a19c435b91231c0750ca9402f/9873a/Shore_Plover_RobSuisted_small_0.jpg',
            'content' => 'One of the rarest shorebirds. The shore plover can be quite the actor ...',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);


    }
}
