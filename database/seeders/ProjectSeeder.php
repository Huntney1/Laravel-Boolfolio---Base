<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;

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
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph();
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->category = $faker->word();
            $newProject->image = $faker->imageUrl();
            $newProject->url = $faker->url();
            $newProject->published = $faker->dateTimeThisYear()->format('Y-m-d H:i:s');

            $newProject->save();
        }

    }
}
?>
