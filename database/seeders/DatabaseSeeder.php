<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*  command:
            php artisan migrate:fresh --seed
            php artisan db:seed
        */

        /* user initial data */
        User::factory(5)->create();
        /*User::create([
            'name' => 'Jodi Jonathan',
            'email' => 'jonathan.tjhia@gmail.com',
            'password' => bcrypt('12345678')
        ]);*/

        /* category initial data */
        Category::create([
            'name' => 'Programming',
            'ref_id' => 'd03c2128-b771-11ed-afa1-0242ac120002',
        ]);
        Category::create([
            'name' => 'Web Design',
            'ref_id' => '5acf2db6-b773-11ed-afa1-0242ac120002',
        ]);
        Category::create([
            'name' => 'Personal',
            'ref_id' => '5acf305e-b773-11ed-afa1-0242ac120002',
        ]);

        /* post initial data */
        Post::factory(10)->create();
        /*Post::create([
            'title' => 'Judul Pertama',
            'ref_id' => '5acf31b2-b773-11ed-afa1-0242ac120002',
            'category_id' => 1,
            'user_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, nam?',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At distinctio doloremque doloribus est eveniet, explicabo magni maiores mollitia nam officia provident quasi quia tempora?</p> <p>Ab architecto facere incidunt laboriosam neque placeat quibusdam ut vel velit vero. Alias architecto asperiores aut commodi cum, debitis dicta eaque earum fugit odio quaerat quis.</p>'
        ]);
        Post::create([
            'title' => 'Judul Kedua',
            'ref_id' => '5acf36a8-b773-11ed-afa1-0242ac120002',
            'category_id' => 2,
            'user_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, nam?',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At distinctio doloremque doloribus est eveniet, explicabo magni maiores mollitia nam officia provident quasi quia tempora?</p> <p>Ab architecto facere incidunt laboriosam neque placeat quibusdam ut vel velit vero. Alias architecto asperiores aut commodi cum, debitis dicta eaque earum fugit odio quaerat quis.</p>'
        ]);
        Post::create([
            'title' => 'Judul Ketiga',
            'ref_id' => '5acf37e8-b773-11ed-afa1-0242ac120002',
            'category_id' => 2,
            'user_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, nam?',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur corporis dignissimos dolorem, ducimus id labore laboriosam maiores minima possimus quasi quis repellendus sit veritatis vitae voluptates voluptatibus? Dignissimos doloremque eius libero omnis qui quo?</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A delectus error ex incidunt magni quam quibusdam repellendus sunt suscipit totam?</p>'
        ]);
        Post::create([
            'title' => 'Judul Keempat',
            'ref_id' => '5acf3c3e-b773-11ed-afa1-0242ac120002',
            'category_id' => 3,
            'user_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, nam?',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur corporis dignissimos dolorem, ducimus id labore laboriosam maiores minima possimus quasi quis repellendus sit veritatis vitae voluptates voluptatibus? Dignissimos doloremque eius libero omnis qui quo? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur corporis dignissimos dolorem, ducimus id labore laboriosam maiores minima possimus quasi quis repellendus sit veritatis vitae voluptates voluptatibus? Dignissimos doloremque eius libero omnis qui quo?</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A delectus error ex incidunt magni quam quibusdam repellendus sunt suscipit totam?</p>'
        ]);*/
    }
}
