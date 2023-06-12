<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            
            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->user_id = 1;
            $project->slug = Str::slug($project->title, '-');
            $project->made_by = $faker->name();
            $project->description = $faker->paragraph(2);
            $project->creation_date = $faker->dateTimeThisYear();
            $project->cover = 'placeholders/' . $faker->image('storage/app/public/placeholders/', fullPath: false, category: 'Projects', word: $project->title, gray: true);
            $project->link = $faker->url();
            $project->code_link = $faker->url();
            $project->trace = $faker->paragraph(3);
            $project->save();
        }
    }
}