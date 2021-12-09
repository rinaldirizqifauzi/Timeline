<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7"> 
                <div class="border rounded-xl p-5">
                    <form action="{{ route('statuses.store') }}" method="post">
                         @csrf
                            <div class="flex">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}"> 
                                </div>
                                <div class="w-full">
                                    <div class="font-semibold"> 
                                        {{ Auth::user()->name }}  
                                    </div>
                                    <div class="my-2"> 
                                        <textarea name="body" id="body" placeholder="What is your mind?" class="form-textarea w-full border-grey-300 rounded-xl resize-none focus:border-blue-300 focus:ring focus:ring-blue-200 transition duration-300"></textarea> 
                                    </div>
                                    <div class="text-right">
                                        <x-button> Post</x-button>
                                    </div>
                                </div>
                            </div> 
                    </form>       
                </div>
            
                <center><h6 class="font-semibold my-5 text-4xl">Postingan<h6></center>
            </div> 
            <div class="col-span-5"> 
                <div class="border p-5 rounded-xl"> 
                    <h1 class="font-semibold mb-5"> Recently Follows </h1>
                    <div class="space-y-5"> 
                        <x-following :users="Auth::user()->follows()->limit(1)->latest()->get()">

                        </x-following>
                    </div> 
                </div> 
            </div> 
        </div>
    </x-container> 
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12"> 
                <div class="space-y-12 mt-5"> 
                    <x-statuses :statuses="$statuses"></x-statuses>
                </div>
            </div>
        <div>
        </div> 
    </x-container> 

</x-app-layout>