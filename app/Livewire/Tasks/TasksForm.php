<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use Livewire\Component;

class TasksForm extends Component
{

    public TaskForm $form;

    public $formTitle = "Add New Task";

    public function store()
    {
        $this->form->createTask();
        request()->session()->flash('success', 'New task added successfully !!');
        $this->dispatch('task-created', title: $this->form->title);
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.tasks.tasks-form');
    }
}
