<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\On;
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

    public function update()
    {
        $this->form->updateTask();
        request()->session()->flash('success', 'Task updated successfully !!');
        $this->dispatch('task-updated', title: $this->form->title);
        $this->form->reset();
        $this->reset('formTitle');
    }

    #[On('edit-task')]
    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        $this->formTitle = "Edit Task " . $task->title;
        $this->form->setForm($task);
    }

    public function clearForm()
    {
        $this->form->reset();
        $this->reset('formTitle');
    }

    public function render()
    {
        return view('livewire.tasks.tasks-form');
    }
}
