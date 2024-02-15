<?php

namespace Database\Seeders;

use App\Models\AccessModifier;
use App\Models\Complaint;
use App\Models\ExpirationTime;
use App\Models\Paste;
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

        $access_modifiers = [[
            'title' => 'public'
        ], [
            'title' => 'unlisted'
        ], [
            'title' => 'private'
        ]];

        foreach ($access_modifiers as $access_modifier) {
            AccessModifier::create($access_modifier);
        }

        $expiration_times = [[
            'title' => '10 минут',
            'volume' => 10
        ], [
            'title' => '1 час',
            'volume' => 60
        ], [
            'title' => '3 часа',
            'volume' => 180
        ], [
            'title' => '1 день',
            'volume' => 1440
        ], [
            'title' => '1 неделя',
            'volume' => 10080
        ], [
            'title' => '1 месяц',
            'volume' => 43200
        ]];

        foreach ($expiration_times as $expiration_time) {
            ExpirationTime::create($expiration_time);
        }

        Paste::create([
            'title' => '1eq',
            'body' => 'wefsdf',
            'type_id' => 1,
            'author_id' => 1,
            'access_modifier_id' => 1,
            'expiration_time_id' => 1
        ]);

        Complaint::create([
            'body' => 'sdfasdfasdf',
            'paste_id' => 1
        ]);
    }
}
