<div class="" x-data="{
    showModal:false,
    handleKeydown(e){
        if(e.keyCode == 191) {
            this.showModal = true
        }

        if(e.keyCode == 27) {
            this.showModal = false;
            $wire.search = ''
        }
    }, 


}">
    <button @click="showModal = true" type="button"
        class="flex space-x-3 py-2 px-4 my-2 outline-none border-b border-slate-200" 
        @keydown.window="handleKeydown"
       
        >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <span class="pr-6">Search</span>
    </button>
    
    @teleport('body')
    <div x-show="showModal" 
        x-trap="showModal"
        x-tansition:enter="transition ease-out duration-300"  
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 "
        
        class="relative z-10" 
        aria-labelledby="modal-title" 
        role="dialog" 
        aria-modal="true">
        <!--
          Background backdrop, show/hide based on modal state.
      
          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div  class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
              Modal panel, show/hide based on modal state.
      
              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div @click.outside="showModal = false" 
              
                class="relative transform p-6 rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
            >
                <div class="relative " x-data="{
                    searchPosts(event){
                        document.getElementById('search').focus();
                        event.preventDefault();
                    }
                }">
                    <input wire:model.live.throttle.500ms="search" @keydown.ctrl.slash.window="searchPosts" id="search" type="text" placeholder="Start typing.. or click - SHIFT + / - to search"  class="block w-full flex-1 py-2 px-3 mt-2 outline-none border-none rounded-md bg-slate-100"/>
                    <div class="absolute mt-2 z-20 w-full overflow-hidden rounded-md bg-slate-50 shadow-2xl">
                        @if (Str::length($this->search) > 0)
                            <div class="p-2 text-xs text-slate-500">
                            
                                @if (count($results) == 0)
                                    <p>Nothing task found..</p>
                                @else
                                    <p>found {{ count($results) }} task</p>
                                @endif
                            </div>
                        @endif
                        @foreach ($results as $result)
                        <div class="cursor-pointer py-2 px-3 hover:bg-slate-100">
                            <p class="text-sm font-bold text-gray-600">{{ $result->title }}</p>
                            <p class="text-sm italic text-gray-600">{{ Str::limit($result->description, 100, '...')  }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
              {{-- <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                  </div>
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Deactivate account</h3>
                    <div class="mt-2">
                      <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                    </div>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
      
    @endteleport

    {{-- <div class="relative w-96 max-w-lg px-1 pt-1" x-data="{
        searchPosts(event){
            document.getElementById('search').focus();
            event.preventDefault();
        }
    }">
        <input wire:model.live.throttle.500ms="search" @keydown.ctrl.slash.window="searchPosts" id="search" type="text" placeholder="Start typing.. or click - SHIFT + / - to search"  class="block w-full flex-1 py-2 px-3 mt-2 outline-none border-none rounded-md bg-slate-100"/>
        <div class="absolute mt-2 w-full overflow-hidden rounded-md bg-white shadow-lg">
            @if (Str::length($this->search) > 2)
                <div class="p-2 text-xs text-slate-500">
                   
                    @if (count($results) == 0)
                        <p>Nothing task found..</p>
                    @else
                        <p>found {{ count($results) }} task</p>
                    @endif
                </div>
            @endif
            @foreach ($results as $result)
            <div class="cursor-pointer py-2 px-3 hover:bg-slate-100">
                <p class="text-sm font-bold text-gray-600">{{ $result->title }}</p>
                <p class="text-sm italic text-gray-600">{{ Str::limit($result->description, 100, '...')  }}</p>
            </div>
            @endforeach
        </div>
    </div> --}}
</div>
