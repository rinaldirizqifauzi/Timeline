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
                        </div>
                    </div>
                </x-container>
            </div>
                <div class="border-b ">
                    <x-container>
                    <div class="flex justify-between items-center">
                        <div class="flex">
                            <a href="{{ route('profile', $user->username) }}" class="px-10 py-3 text-center border-r border-l">
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
                            <div>
                                @if(Auth::user()->isNot($user))
                                    <form action="{{ route('following.store', $user->username) }}" method="post">
                                        @csrf
                                        <x-button>
                                        @if(Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                            Unfollow
                                        @else
                                            Follow
                                        @endif
                                        </x-button>
                                    </form>
                                @else
                                    <a href="" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl text-sm text-white capitalize tracking-widest hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Edit profile
                                    </a>
                                @endif
                            </div>

                    </div>
                    </x-container>
                </div>
                
            <x-container>
                    <div class="grid grid-cols-2 gap-5 my-4">
                        <x-statuses :statuses="$statuses"></x-statuses>
                    </div>
            </x-container>
        </div>
    </x-app-layout>