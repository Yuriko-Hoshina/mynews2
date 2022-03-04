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
        /*
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
        
        
        //  趣味の大分類選択肢を以下に記載
        \DB::table('hobby_categories')->insert([
            [
                'name' => '外へ出る',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '家でもできる',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'スポーツ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
        */
        
        //  細かい趣味の分類を以下に記載
        \DB::table('hobbies')->insert([
            /*[
                'hobby_category_id' => '1',
                'name' => 'カフェ巡り',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => '美術館巡り',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => '登山',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => 'キャンプ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => 'ヨガ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => 'ゲーム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => 'DIY',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => 'ガーデニング',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'サッカー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => '野球',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'スキー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'ゴルフ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '4',
                'name' => 'ボランティア',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '4',
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ], */
            [
                'hobby_category_id' => '2',
                'name' => 'カラオケ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => '楽器演奏',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => '映画鑑賞',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => 'アニメ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => '読書',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => '瞑想',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => '筋トレ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => '料理',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => 'アクアリウム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => 'イラスト',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '2',
                'name' => '漫画制作',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => '動物園巡り',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => 'ラーメン巡り',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => 'サイクリング',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => 'ドライブ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '1',
                'name' => 'バイク',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'ランニング',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'ダンス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'ダンス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'バスケ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'スノボ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'バレーボール',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'テニス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'hobby_category_id' => '3',
                'name' => 'サーフィン',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
