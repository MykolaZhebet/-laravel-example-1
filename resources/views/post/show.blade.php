<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-5xl mb-4">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->author" />
                </div>
                <div>

                    <x-follow-container :user="$post->author" class="flex gap-2">
                        <a href="{{ route('profile.show', $post->author) }}"
                            class="hove:underline">{{ $post->author->name }}</a>
                        &middot;
                        <button class="text-emerald-500" x-text="following ? 'Unfollow': 'Follow'"
                            :class="following ? 'text-red-600': 'text-emerald-600'" @click="follow()"></button>
                    </x-follow-container>

                    <div class="flex gap-2 text-gray-500 text-sm">
                        {{ $post->readTime()  }} min read
                        &middot;
                        {{ $post->created_at->format('M d, Y')}}
                    </div>
                </div>

                <x-clap-button :post="$post" />
                <div>
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full" />
                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>
                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-300 rounded-2xl">Category: {{ $post->category->name }}</span>
                </div>
            </div>

        </div>
    </div>
    @if ($errors->any())
        <div style=" color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-app-layout>