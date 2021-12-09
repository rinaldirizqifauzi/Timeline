<x-app-layout>
    <div>
        <div class="border-b -m-8 py-24">
            <x-container>
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="rounded-full w-16 border-2 border-blue-500 p-1" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">    
                    </div>
                    <div>
                        <h1 class="font-semibold mb-3"> {{ $user->name }} </h1>
                    <div class="text-sm text-grey-500">
                        Joined {{ $user->created_at->diffForHumans() }}
                    </div>
                         Follow
                    </div>
                </div>
            </x-container>
        </div>
            <div class="border-b mb-3">
                <x-container>
                <div class="flex">
                    <a href="{{ route('profile.statuses', $user->username) }}" class="px-10 py-3 text-center border-r border-l">
                        <div class="text-2xl my-3 font-semibold">{{ $user->statuses->count() }}</div>
                        <div class="uppercase text-xs text-grey-600">Status</div>
                    </a>
                     <a href="{{ route('profile.following', $user->username) }}" class="px-10 py-3 text-center border-r">
                        <div class="text-2xl my-3 font-semibold">{{ $user->follows->count() }}</div>
                        <div class="uppercase text-xs text-grey-600">Following</div>
                    </a>
                      <a href="{{ route('profile.follower', $user->username) }}" class="px-10 py-3 text-center border-r">
                        <div class="text-2xl my-3 font-semibold">{{ $user->followers->count() }}</div>
                        <div class="uppercase text-xs text-grey-600">Follower</div>
                    </a>
                </div>
                </x-container>
            </div>
            
        <x-container>
            <div class="grid-cols-2">
                <div class="grid grid-cols-2">
                    <div class="space=y-5">
                      <x-statuses :statuses="$statuses"></x-statuses>
                    </div>
                </div>
            </div>
        </x-container>
    </div>
</x-app-layout>