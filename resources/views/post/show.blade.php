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
                    @if($post->author->image)
                        <img src="{{$post->author->imageUrl()}}" alt="" />
                    @else
                        <img src="{{ $post->author->image}}" alt="" />
                    @endif
                </div>
                <div>
                    <div class="flex gap-2">
                        <h3>{{ $post->author->name }}</h3>
                        &middot;
                        <a href="#" class="text-emerald-500">Follow</a>
                    </div>

                    <div class="flex gap-2 text-gray-500 text-sm">
                        {{ $post->readTime()  }} min read
                        &middot;
                        {{ $post->created_at->format('M d, Y')}}
                    </div>
                </div>

                <x-clap-button />
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