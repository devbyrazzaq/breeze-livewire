 <div class="">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $pageTitle }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                    <livewire:tasks.tasks-list />
                    <livewire:tasks.tasks-form />
                </div>
            </div>
        </div>

</div>

