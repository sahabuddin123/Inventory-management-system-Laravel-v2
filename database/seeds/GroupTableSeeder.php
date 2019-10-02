<?php

use Illuminate\Database\Seeder;
use App\Models\Groups;
class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Groups::create([
            'name'        => 'Author',
            'slug'        => 'author',
            'permissions' => json_encode([
                'create-post' => true,
            ]),
        ]);

        $editor = Groups::create([
            'name'        => 'Editor',
            'slug'        => 'editor',
            'permissions' => json_encode([
                'update-post'  => true,
                'publish-post' => true,
            ]),
        ]);
    }
}
