<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Lab;
use App\Models\Jenjang;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();

        User::create([
            'firstName' => 'Danheng',
            'lastName' => 'Budiman',
            'username' => 'danheng',
            'password' => 'halo123',
            'remember_token' => 'asdghfjhdsgfhgasdg',
            'nim' => 'G6401201000',
            'email' => 'danheng@gmail.com',
            'noTelp' => '081288888888',
            'jenjang_id' => 1,
            'is_admin' => 1
        ]);

        User::create([
            'firstName' => 'Noval',
            'lastName' => 'Rizad',
            'username' => 'Nori',
            'password' => 'halo123',
            'remember_token' => 'asdghfjhdsgfhgasdg',
            'nim' => 'G6401201000',
            'email' => 'danheng@gmail.com',
            'noTelp' => '081288888888',
            'jenjang_id' => 2,
            'is_admin' => 0
        ]);

        // User::create([
        //     'name' => 'Gepard',
        //     'email' => 'gepard@gmail.com',
        //     'password' => bcrypt('gepard123')
        // ]);

        // User::create([
        //     'name' => 'Jing Yuan',
        //     'email' => 'jingyuan@gmail.com',
        //     'password' => bcrypt('jingyuan123')
        // ]);

        Lab::create([
            'name' => 'SEIS',
            'slug' => 'seis'
        ]);

        Lab::create([
            'name' => 'CIO',
            'slug' => 'cio'
        ]);

        Lab::create([
            'name' => 'CSN',
            'slug' => 'csn'
        ]);
        
        Jenjang::create([
            'name' => 'Undergraduate',
            'slug' => 'undergraduate'
        ]);

        Jenjang::create([
            'name' => 'Master',
            'slug' => 'master'
        ]);
        
        Jenjang::create([
            'name' => 'Disertation',
            'slug' => 'disertation'
        ]);
        
        Post::factory(30)->create();
        
        Post::create([
            'title' => 'Astral Express',
            'lab_id' => 1,
            'jenjang_id' => 1,
            'dosenFirstName' => 'Marguerite',
            'dosenLastName' => 'Jaskolski',
            'url' => 'https://bayer.net/perspiciatis-atque-sint-magnam-quia-ut.html',
            'poster' => 'public/img/cover-poster/posterskripsi.jpg',
            'slug' => 'astral-express', 
            'user_id' => 1,
            'published_at' => '2050-09-11',
            'abstract' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, earum magni animi architecto expedita cupiditate sed placeat temporibus, autem repellendus ad minima voluptates eligendi necessitatibus molestiae sit cum nam! Id magni qui aliquam blanditiis inventore at ipsum asperiores repellendus porro error quibusdam non sapiente nemo assumenda ipsam, perferendis nostrum est similique! Placeat autem pariatur soluta veritatis esse at consequatur neque temporibus quis excepturi! Perferendis, explicabo minima quo illo laborum consequuntur veniam voluptatibus corporis dolorem, inventore ad iure possimus quae quod. Nisi, beatae magnam aperiam consequatur consequuntur reiciendis at accusamus recusandae cupiditate molestiae fugiat quidem doloremque. Voluptatibus autem at eligendi. Nobis officia distinctio soluta dolor dolorem error eligendi odio aspernatur ratione assumenda animi iure dolorum possimus consectetur et enim, facere nostrum est earum iste. Omnis ex consectetur veniam rem necessitatibus voluptas illum totam praesentium reprehenderit quidem saepe corporis ullam eos dolore vero nisi exercitationem nihil nemo, in quos ab commodi molestias adipisci quibusdam. Consequatur impedit doloribus voluptates nostrum veritatis hic iure deleniti corporis sed sit? Vero fuga ex delectus perferendis quasi ut, labore laborum sequi rem exercitationem, tempora omnis beatae iste, quidem quia commodi. Debitis natus deserunt ipsum id. Deleniti pariatur praesentium quibusdam itaque quas animi adipisci, aliquid dolorum reiciendis ab.'
        ]);

        Post::create([
            'title' => 'Astral Express',
            'lab_id' => 2,
            'jenjang_id' => 2,
            'dosenFirstName' => 'Cydney',
            'dosenLastName' => 'Jaskolski',
            'url' => 'https://bayer.net/perspiciatis-atque-sint-magnam-quia-ut.html',
            'poster' => 'cover-poster/posterskripsi.jpg',
            'slug' => 'veniam-inventore-odio-ut-quis-sunt-et-ab', 
            'user_id' => 2,
            'published_at' => '2050-09-11',
            'abstract' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, earum magni animi architecto expedita cupiditate sed placeat temporibus, autem repellendus ad minima voluptates eligendi necessitatibus molestiae sit cum nam! Id magni qui aliquam blanditiis inventore at ipsum asperiores repellendus porro error quibusdam non sapiente nemo assumenda ipsam, perferendis nostrum est similique! Placeat autem pariatur soluta veritatis esse at consequatur neque temporibus quis excepturi! Perferendis, explicabo minima quo illo laborum consequuntur veniam voluptatibus corporis dolorem, inventore ad iure possimus quae quod. Nisi, beatae magnam aperiam consequatur consequuntur reiciendis at accusamus recusandae cupiditate molestiae fugiat quidem doloremque. Voluptatibus autem at eligendi. Nobis officia distinctio soluta dolor dolorem error eligendi odio aspernatur ratione assumenda animi iure dolorum possimus consectetur et enim, facere nostrum est earum iste. Omnis ex consectetur veniam rem necessitatibus voluptas illum totam praesentium reprehenderit quidem saepe corporis ullam eos dolore vero nisi exercitationem nihil nemo, in quos ab commodi molestias adipisci quibusdam. Consequatur impedit doloribus voluptates nostrum veritatis hic iure deleniti corporis sed sit? Vero fuga ex delectus perferendis quasi ut, labore laborum sequi rem exercitationem, tempora omnis beatae iste, quidem quia commodi. Debitis natus deserunt ipsum id. Deleniti pariatur praesentium quibusdam itaque quas animi adipisci, aliquid dolorum reiciendis ab.'
        ]);

        Post::create([
            'title' => 'Astral Express',
            'lab_id' => 1,
            'jenjang_id' => 1,
            'dosenFirstName' => 'Marguerite',
            'dosenLastName' => 'Jaskolski',
            'url' => 'https://bayer.net/perspiciatis-atque-sint-magnam-quia-ut.html',
            'poster' => 'cover-poster/posterskripsi.jpg',
            'slug' => 'molestias-aut-necessitatibus-corrupti-est-nihil-aliquid-et', 
            'user_id' => 2,
            'published_at' => '2050-09-11',
            'abstract' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, earum magni animi architecto expedita cupiditate sed placeat temporibus, autem repellendus ad minima voluptates eligendi necessitatibus molestiae sit cum nam! Id magni qui aliquam blanditiis inventore at ipsum asperiores repellendus porro error quibusdam non sapiente nemo assumenda ipsam, perferendis nostrum est similique! Placeat autem pariatur soluta veritatis esse at consequatur neque temporibus quis excepturi! Perferendis, explicabo minima quo illo laborum consequuntur veniam voluptatibus corporis dolorem, inventore ad iure possimus quae quod. Nisi, beatae magnam aperiam consequatur consequuntur reiciendis at accusamus recusandae cupiditate molestiae fugiat quidem doloremque. Voluptatibus autem at eligendi. Nobis officia distinctio soluta dolor dolorem error eligendi odio aspernatur ratione assumenda animi iure dolorum possimus consectetur et enim, facere nostrum est earum iste. Omnis ex consectetur veniam rem necessitatibus voluptas illum totam praesentium reprehenderit quidem saepe corporis ullam eos dolore vero nisi exercitationem nihil nemo, in quos ab commodi molestias adipisci quibusdam. Consequatur impedit doloribus voluptates nostrum veritatis hic iure deleniti corporis sed sit? Vero fuga ex delectus perferendis quasi ut, labore laborum sequi rem exercitationem, tempora omnis beatae iste, quidem quia commodi. Debitis natus deserunt ipsum id. Deleniti pariatur praesentium quibusdam itaque quas animi adipisci, aliquid dolorum reiciendis ab.'
        ]);

        // Post::create([
        //     'title' => 'Belobog',
        //     'lab_id' => 1,
        //     'jenjang_id' => 2,
        //     'slug' => 'belobog', 
        //     'user_id' => 2,            'published_at' => '2050-09-11',
        //     'abstract' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, earum magni animi architecto expedita cupiditate sed placeat temporibus, autem repellendus ad minima voluptates eligendi necessitatibus molestiae sit cum nam! Id magni qui aliquam blanditiis inventore at ipsum asperiores repellendus porro error quibusdam non sapiente nemo assumenda ipsam, perferendis nostrum est similique! Placeat autem pariatur soluta veritatis esse at consequatur neque temporibus quis excepturi! Perferendis, explicabo minima quo illo laborum consequuntur veniam voluptatibus corporis dolorem, inventore ad iure possimus quae quod. Nisi, beatae magnam aperiam consequatur consequuntur reiciendis at accusamus recusandae cupiditate molestiae fugiat quidem doloremque. Voluptatibus autem at eligendi. Nobis officia distinctio soluta dolor dolorem error eligendi odio aspernatur ratione assumenda animi iure dolorum possimus consectetur et enim, facere nostrum est earum iste. Omnis ex consectetur veniam rem necessitatibus voluptas illum totam praesentium reprehenderit quidem saepe corporis ullam eos dolore vero nisi exercitationem nihil nemo, in quos ab commodi molestias adipisci quibusdam. Consequatur impedit doloribus voluptates nostrum veritatis hic iure deleniti corporis sed sit? Vero fuga ex delectus perferendis quasi ut, labore laborum sequi rem exercitationem, tempora omnis beatae iste, quidem quia commodi. Debitis natus deserunt ipsum id. Deleniti pariatur praesentium quibusdam itaque quas animi adipisci, aliquid dolorum reiciendis ab.'
        // ]);

        // Post::create([
        //     'title' => 'Xianzhou Loufu',
        //     'lab_id' => 2,
        //     'jenjang_id' => 2,
        //     'slug' => 'xianzhou-loufu', 
        //     'user_id' => 3,
        //     'published_at' => '2050-09-11',
        //     'abstract' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, earum magni animi architecto expedita cupiditate sed placeat temporibus, autem repellendus ad minima voluptates eligendi necessitatibus molestiae sit cum nam! Id magni qui aliquam blanditiis inventore at ipsum asperiores repellendus porro error quibusdam non sapiente nemo assumenda ipsam, perferendis nostrum est similique! Placeat autem pariatur soluta veritatis esse at consequatur neque temporibus quis excepturi! Perferendis, explicabo minima quo illo laborum consequuntur veniam voluptatibus corporis dolorem, inventore ad iure possimus quae quod. Nisi, beatae magnam aperiam consequatur consequuntur reiciendis at accusamus recusandae cupiditate molestiae fugiat quidem doloremque. Voluptatibus autem at eligendi. Nobis officia distinctio soluta dolor dolorem error eligendi odio aspernatur ratione assumenda animi iure dolorum possimus consectetur et enim, facere nostrum est earum iste. Omnis ex consectetur veniam rem necessitatibus voluptas illum totam praesentium reprehenderit quidem saepe corporis ullam eos dolore vero nisi exercitationem nihil nemo, in quos ab commodi molestias adipisci quibusdam. Consequatur impedit doloribus voluptates nostrum veritatis hic iure deleniti corporis sed sit? Vero fuga ex delectus perferendis quasi ut, labore laborum sequi rem exercitationem, tempora omnis beatae iste, quidem quia commodi. Debitis natus deserunt ipsum id. Deleniti pariatur praesentium quibusdam itaque quas animi adipisci, aliquid dolorum reiciendis ab.'
        // ]);
    }
}
