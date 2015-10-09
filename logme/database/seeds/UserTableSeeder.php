<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user = factory(App\User::class)->make();
        $user->id = 1;
        $user->email = 'hi@0xdb.pw';
        $user->name = 'Daniel Baeck';
        $user->save();
        factory(App\User::class, 20)->create();
    }
}
