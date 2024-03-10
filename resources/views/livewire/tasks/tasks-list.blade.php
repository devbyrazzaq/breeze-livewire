<div class="  text-gray-900 dark:text-gray-100  bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if (session('success'))
        <div class="bg-emerald-500 text-white alert-success">
            <div class=" flex justify-between mx-auto py-2 sm:px-4 lg:px-6">
                <p class="">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    <div class="p-6 space-y-4">

        <h1 class="  text-xl font-bold">Taks List - {{ $this->tasks->count() }} task</h1>
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
                    <div class="">
                        <button type="button" wire:click="destroy({{ $task->id }})" wire:confirm="Are you sure you want to delete this post?" class="text-sm px-4 py-2  rounded-lg  border border-slate-500 hover:opacity-80" >Edit</button>
                        <button type="button" wire:click="destroy({{ $task->id }})" wire:confirm="Are you sure you want to delete this post?" class="text-sm px-4 py-2  rounded-lg bg-red-600 border border-red-600 text-white hover:opacity-80" >Delete</button>
                    </div>
                </div>
            @endforeach
            <div class="mt-2 mb-12 p-2">
                {{ $this->tasks->links() }}
            </div>
        </div>
    </div>
</div>