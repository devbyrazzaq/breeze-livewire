<div class="  text-gray-900 dark:text-gray-100  bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if (session('success'))
        <div class="bg-emerald-500 text-white alert-success">
            <div class=" flex justify-between mx-auto py-2 sm:px-4 lg:px-6">
                <p class="">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    <div class="p-6 space-y-4">

            <livewire:tasks.tasks-count :tasksCount="$this->tasksCount" :tasksCountByStatus="$this->tasksCountByStatus"/>
            @foreach ($this->tasks as $task)        
                <div class="p-4 rounded-lg shadow-lg bg-white border border-slate-300 space-y-4">
                    <div class="flex justify-between items-center">
                        <h1>{{ $task->title }}</h1>
                        <p class="text-sm">{{ $task->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="text-sm">
                        <p class="font-bold">Deadline : {{ $task->deadline->diffForHumans() }}</p>
                        <p class="text-slate-700 ">{{ $task->description }}</p>
                    </div>
                    <div class="flex justify-between">
                        <div class="">
                            @foreach (App\Enums\StatusType::cases() as $case)
                                <button type="button"
                                    wire:click="changeStatus({{ $task->id }}, '{{ $case->value }}')"
                                    @class([
                                        'inline-flex items-center px-4 py-2 bg-white border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150',
                                        $case->color() => true,
                                    ])
                                    {{ $case->value == $task->status->value ? 'disabled' : '' }}>
                                    {{ $case->value }}
                                </button>
                            @endforeach
                        </div>
                        <div class="">
                            <button type="button" wire:click="$dispatch('edit-task', {id:{{ $task->id }}})" class="text-sm px-4 py-2  rounded-lg  border border-slate-500 hover:opacity-80" >Edit</button>
                            <button type="button" wire:click="destroy({{ $task->id }})" wire:confirm="Are you sure you want to delete this post?" class="text-sm px-4 py-2  rounded-lg bg-red-600 border border-red-600 text-white hover:opacity-80" >Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-2 mb-12 p-2">
                {{ $this->tasks->links() }}
            </div>
        </div>
    </div>
</div>