@props([
    'tweet',
])

<div class="card">
    <div class="card-body py-4 px-7">
        @if($tweet->parentTweet)
            <div class="flex items-center mb-1 ">
                <div class="avatar mr-2">
                    <div class="size-9  rounded-box">
                        <img src="/storage/{{ $tweet->user->avatar }}" alt="avatar " />
                    </div>
                </div>
                <div>
                    <p class="font-bold">{{ $tweet->user->name }}</p>
                    <p class="text-xs text-gray-500">
                        رد على 
                        <a href="{{ route('tweet.view', $tweet->parentTweet->id) }}" 
                           class="text-blue-500 hover:underline">
                            {{ $tweet->parentTweet->user->name }}
                        </a>
                    </p>
                </div>
            </div>
            <p>{{ $tweet->content }}</p>
        @else
            {{-- شكل التغريدة الأصلية --}}
            <p>{{ $tweet->content }}</p>
        @endif
    </div>

    <div class="card-actions p-4 pt-0 flex justify-between items-center">
        @if (request()->routeIs('Home'))
            <a 
                href="{{ route('tweet.view', $tweet->baseTweet->id) }}" 
                class="btn btn-text btn-square"
            >
                <span class="icon-[tabler--message]"></span>
            </a>
        @else
            <button 
                onclick="document.querySelector(`input[name='parent_tweet_id']`).value = {{ $tweet->id }}"
                class="btn btn-text btn-square"
            >
                <span class="icon-[tabler--message]"></span>
            </button>
        @endif

        @if(!$tweet->parentTweet)
            <a class="flex btn btn-text">
                <div>
                    {{ $tweet->user->name }}
                </div>
                <div class="avatar">
                    <div class="size-9 rounded-box">
                        <img src="/storage/{{ $tweet->user->avatar }}" alt="avatar" />
                    </div>
                </div>
            </a>
        @endif
    </div>
</div>

@if (request()->routeIs('tweet.view'))
    <div class="ms-6 ps-1 space-y-2 border-s-2">
        @foreach ($tweet->childTweets as $childTweet)
            <x-tweet :tweet="$childTweet"/>
        @endforeach
    </div>
@endif