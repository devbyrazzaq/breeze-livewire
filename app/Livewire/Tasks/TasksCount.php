<?php

namespace App\Livewire\Tasks;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class TasksCount extends Component
{
    #[Reactive]
    public $tasksCount;
    #[Reactive]
    public $tasksCountByStatus;

    public function render()
    {
        return view('livewire.tasks.tasks-count');
    }
}
