<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();
        factory(App\Project::class)->create([
            'id' => '1',
           'title' => 'logme'
        ]);
        factory(App\Project::class, 5)->create();
    }
}
