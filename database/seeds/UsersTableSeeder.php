<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++) {
            DB::table('users')->insert([
                'name' => 'mogemoge' . $i,
                'email' => 'moge' . $i . '@moge.com',
                'password' => 'mogemoge ' . $i
            ]);
        }
    }
}
