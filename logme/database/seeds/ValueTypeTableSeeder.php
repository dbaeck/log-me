<?php

use Illuminate\Database\Seeder;

class ValueTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('value_types')->delete();
        factory(App\ValueType::class)->create();
    }
}
