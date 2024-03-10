<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    #[Computed]
    public function tasks()
    {
        return  auth()->user()->tasks()->orderBy('deadline', 'desc')->paginate(3);
    }

    // #[On('task-deleted')]
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        request()->session()->flash('success', 'Taks deleted successfully');
        // $this->dispatch('task-deleted');
    }

    #[On('task-created')]
    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }
}
