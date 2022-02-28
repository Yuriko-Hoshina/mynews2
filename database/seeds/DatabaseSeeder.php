<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \DB::table('genders')->insert([
          [
              'name' => '男性',
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
          ],
          [
              'name' => '女性',
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
          ],
          [
              'name' => 'その他',
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
          ],
          [
              'name' => '解答しない',
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
          ],
        ]);
    }
}
