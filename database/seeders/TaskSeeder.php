<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tasks')->insert([
                'title' => fake()->text(10),
                'description' => fake()->text(100),
                'type' => fake()->randomNumber(1, false),
                'status' => fake()->randomNumber(1, false),
                'start_date' =>fake()->dateTime('2022-02-25 08:37:17'),
                'due_date' =>fake()->dateTime(),
                'assignee' => User::all()->random()->id,
                'estimate' => fake()->randomFloat(),
                'actual' => fake()->randomFloat(),
            ]);
        }
    }
}
