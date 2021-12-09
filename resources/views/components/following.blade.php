@foreach($users as $user)

<x-card>
    <div class="flex items-center">
        <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}"> 
        </div>
        <div>
            <a href="{{route('profile', Auth::user()->username)}}" class="font-semibold block"> 
                {{ $user->name }}
            </a>
              @if( request()->routeIs('users.index'))     
              <div class="mt-3">
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
              </div>
              @endif
            <div>
                @if($user->pivot)
                {{ $user->pivot-> created_at->diffForHumans() }}
                @endif
            </div>
        </div>
    </div>
</x-card>
 @endforeach