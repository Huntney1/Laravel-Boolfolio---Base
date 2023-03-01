<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i <= 10; $i++) {

            $newProject = new Project();
            $newProject->title = $faker->sentence();
            $newProject->description = $faker->paragraph();
            $newProject->category = $faker->word();
            $newProject->image = $faker->imageUrl();
            $newProject->url = $faker->url();
            $newProject->published = $faker->boolean();

            $newProject->save();
        }

        /*  Project::create([
            'title' => 'Project 1',
            'description' => 'Description for Project 1',
            'image' => 'https://picsum.photos/200/300',
            'url' => 'https://picsum.photos/200/300',
        ]);

        Project::create([
            'title' => 'Project 2',
            'description' => 'Description for Project 2',
            'image' => 'https://picsum.photos/200/300',
            'url' => 'https://picsum.photos/200/300',
        ]);

        Project::create([
            'title' => 'Progetto 3',
            'description' => 'Descrizione del progetto 3',
            'image' => 'https://picsum.photos/200/300',
            'url' => 'https://picsum.photos/200/300',

        ]); */
    }
}
