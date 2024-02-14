<?php

namespace Database\Seeders;

use App\Models\Access_modifier;
use App\Models\Expiration_time;
use App\Models\Post;
use App\Models\Role;
use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $types = [[
            'title' => 'text'
        ], [
            'title' => 'java'
        ], [
            'title' => 'php'
        ], [
            'title' => 'js'
        ]];

        foreach ($types as $type) {
            Type::create($type);
        }

        $roles = [[
            'title' => 'user'
        ], [
            'title' => 'admin'
        ]];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $access_modifiers = [[
            'title' => 'public'
        ], [
            'title' => 'unlisted'
        ], [
            'title' => 'private'
        ]];

        foreach ($access_modifiers as $access_modifier) {
            Access_modifier::create($access_modifier);
        }

        $expiration_times = [[
            'volume' => 10
        ], [
            'volume' => 60
        ], [
            'volume' => 180
        ], [
            'volume' => 1440
        ], [
            'volume' => 10080
        ], [
            'volume' => 43200
        ]];

        foreach ($expiration_times as $expiration_time) {
            Expiration_time::create($expiration_time);
        }
        Post::create([
            'title' => '1eq',
            'body' => 'wefsdf',
            'type_id' => 1,
            'author_id' => 1,
            'access_modifier_id' => 1,
            'expiration_time_id' => 1
        ]);
    }
}
