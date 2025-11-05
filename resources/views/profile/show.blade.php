<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl">{{ $user->name }}</h1>
                        <div class="mt-8">
                            @forelse($posts as $post)
                                <x-post-item :post="$post" />
                            @empty
                                <div class="text-center">
                                    <p class="text-gray-400 py-14"> No post found</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="w-[320px] border-1 px-8">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500">26k followers</p>
                        <p>
                            {{ $user->bio }}
                        </p>
                        <div clas="mt-4">
                            <button class="bg-emerald-600 rounded-full px-4 py-2 text-white">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>