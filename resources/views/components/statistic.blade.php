<x-container>
    <div class="flex">
        <a href="{{ route('profile', $user) }}" class="px-10 py-3 text-center border-r border-l">
            <div class="text-2xl my-3 font-semibold">{{ $user->statuses->count() }}</div>
            <div class="uppercase text-xs text-grey-600">Status</div>
        </a>
        <a href="{{ route('profile.following', $user) }}" class="px-10 py-3 text-center border-r">
            <div class="text-2xl my-3 font-semibold">{{ $user->follows->count() }}</div>
            <div class="uppercase text-xs text-grey-600">Following</div>
        </a>
        <a href="{{ route('profile.follower', $user) }}" class="px-10 py-3 text-center border-r">
            <div class="text-2xl my-3 font-semibold">{{ $user->followers->count() }}</div>
            <div class="uppercase text-xs text-grey-600">Follower</div>
        </a>
    </div>
</x-container>