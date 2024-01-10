<?php

namespace Database\Seeders;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        $types = Type::all();
        $ids = $types->pluck('id');

        $technlogies = Technology::all();
        $tech_ids = $technlogies->pluck('id');

        for($i= 0; $i < 10; $i++){
            $new_project = new Project();
            $new_project->name = $faker->sentence(5);
            $new_project->description = $faker->text(500);
            $new_project->link = 'https://github.com/SabrinaGiancaspr/'. Str::slug($new_project->name);
            $new_project->project_status = $faker->randomElement(['in progress', 'done']);
            $new_project->type_id = $faker->optional()->randomElement($ids);
            $new_project->save();
            $new_project->technologies()->attach($faker->randomElements($tech_ids, null));
        }
    }
}
