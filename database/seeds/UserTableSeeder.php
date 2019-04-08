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
        factory(App\User::class, 10)->create()->each(function($user)
        {
        	$user->news()->saveMany(factory(App\News::class, rand(1, 4))->create([
                'user_id' => $user->id
                ])
            );
        });
        DB::table('users')->insert([
            'name' => 'Do Nam Huy',
            'email' => 'namhuydo18@gmail.com',
            'password' => bcrypt('namhuy98'),
            'level' => 0,
        ]);
    }
}
