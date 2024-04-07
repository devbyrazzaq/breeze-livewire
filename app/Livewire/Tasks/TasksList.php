<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('skeleton');
    }

    #[Computed]
    public function tasks()
    {
        return  auth()->user()->tasks()->orderBy('deadline', 'desc')->paginate(3);
    }

    #[Computed]
    public function tasksCount()
    {
        return auth()->user()->tasks()->count();
    }

    #[Computed]
    public function tasksCountByStatus()
    {
        return auth()->user()->tasks()->select('status', DB::raw("COUNT(*) as count"))->groupBy('status')->orderBy('status', 'desc')->get();
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        request()->session()->flash('success', 'Taks deleted successfully');
    }

    public function changeStatus($id, $status)
    {
        $task = Task::findOrFail($id);
        $task->update([
            "status" => $status
        ]);
        request()->session()->flash('success', 'Status updated successfully');
    }


    #[On(['task-created', 'task-updated'])]
    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }
}
