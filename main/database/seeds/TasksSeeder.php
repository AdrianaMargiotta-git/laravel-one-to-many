<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Employee;
use App\Typology;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 50)
            ->make()
            ->each(function($task){
                $employee = Employee::inRandomOrder() -> first();
                $task -> employee() -> associate($employee);
                $task -> save();

                $typologies = Typology::inRandomOrder() -> limit(rand(1,5)) -> get();
                $task -> typologies() -> attach($typologies);
                $task -> save();
            });
    }
}
