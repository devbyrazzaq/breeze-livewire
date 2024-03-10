<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\WithPagination;

class TasksIndex extends Component
{
    use WithPagination;
    public $pageTitle = "Tasks";

    public function render()
    {
        return view('livewire.tasks.tasks-index')->layout('layouts.app');
    }
}
