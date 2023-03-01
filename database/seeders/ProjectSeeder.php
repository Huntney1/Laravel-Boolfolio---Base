<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
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

        ]);
    }
}
