<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create([
            'title' => 'Learn Laravel',
            'description' => 'Complete the Laravel tutorial and build a todo app',
            'completed' => false
        ]);

        Todo::create([
            'title' => 'Setup Vue.js',
            'description' => 'Configure Vue.js with Inertia.js for the frontend',
            'completed' => true
        ]);

        Todo::create([
            'title' => 'Style with Tailwind',
            'description' => 'Apply beautiful styling using Tailwind CSS',
            'completed' => false
        ]);

        Todo::create([
            'title' => 'Add CRUD functionality',
            'description' => 'Implement Create, Read, Update, Delete operations for todos',
            'completed' => false
        ]);

        Todo::create([
            'title' => 'Test the application',
            'description' => 'Thoroughly test all features and fix any bugs',
            'completed' => false
        ]);
    }
}
