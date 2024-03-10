<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if (session('success'))
        <div class="bg-emerald-500 text-white alert-success">
            <div class=" flex justify-between mx-auto py-2 sm:px-4 lg:px-6">
                <p class="">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    <div class=" p-6 text-gray-900 dark:text-gray-100 space-y-4">
        <h1 class="font-black text-lg">{{ $formTitle }}</h1>
        <div class="">
            <form wire:submit="store">
                <div class="mb-3">
                    <label 
                        for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Title</label>
                    <input type="text" wire:model.blur="form.title" id="title" class="bg-gray-50 border border-gray-300 text-sm font-medium rounded-lg text-gray-900 dark:text-white focus:ring-blue-500 w-full">
                    <div class="">
                        @error('form.title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label 
                        for="slug"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Slug</label>
                    <input type="text" wire:model.blur="form.slug" id="slug" class="bg-gray-50 border border-gray-300 text-sm font-medium rounded-lg text-gray-900 dark:text-white focus:ring-blue-500 w-full">
                    <div class="">
                        @error('form.slug')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label 
                        for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Description</label>
                    <textarea  wire:model.blur="form.description"  id="description" class="bg-gray-50 border border-gray-300 text-sm font-medium rounded-lg text-gray-900 dark:text-white focus:ring-blue-500 w-full"></textarea>
                    <div class="">
                        @error('form.description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label 
                        for="status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Status</label>
                    <select  wire:model.blur="form.status" id="status" class="bg-gray-50 border border-gray-300 text-sm font-medium rounded-lg text-gray-900 dark:text-white focus:ring-blue-500 w-full">
                        <option value=""></option>
                        @foreach (\App\Enums\StatusType::cases() as $status)
                            <option value="{{ $status->value }}">{{$status->value}}</option>
                        @endforeach
                    </select>
                    <div class="">
                        @error('form.status')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label 
                        for="priority"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Priority</label>
                    <select  wire:model.blur="form.priority" id="priority" class="bg-gray-50 border border-gray-300 text-sm font-medium rounded-lg text-gray-900 dark:text-white focus:ring-blue-500 w-full">
                        <option value=""></option>
                        @foreach (\App\Enums\PriorityType::cases() as $priority)
                            <option value="{{ $priority->value }}">{{$priority->value}}</option>
                        @endforeach
                    </select>
                    <div class="">
                        @error('form.priority')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label 
                        for="deadline"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Deadline</label>
                    <input  wire:model.blur="form.deadline" type="datetime-local" id="deadline" class="bg-gray-50 border border-gray-300 text-sm font-medium rounded-lg text-gray-900 dark:text-white focus:ring-blue-500 w-full">
                    <div class="">
                        @error('form.deadline')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 flex justify-end">
                    <button type="submit" wire:loading.remove class="bg-indigo-500 px-4 py-2  font-medium rounded-lg text-white dark:text-white ">Submit</button>
                    <button type="button" wire:loading class="bg-indigo-500 opacity-80 px-4 py-2  font-medium rounded-lg text-white dark:text-white " disabled>Saving Task ...</button>
                </div>
        </form>
    </div>
</div>
</div>