
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-category-tabs name='Categories'/>
                </div>
            </div>

            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8"> --}}
            <div class="mt-8 text-gray-900">
                {{-- <div class="p-4"> --}}
                    <!-- Flowbit Tabs -->
                        
                        {{-- @foreach($posts as $post) --}}
                        @forelse($posts as $post)
                            <x-post-item :post="$post"/>
                        @empty
                            <div class="text-center">
                                <p class="text-gray-400 py-14">  No post found</p>
                            </div>
                        @endforelse

                    <!-- Flowbit Tabs -->
                    {{ $posts->onEachSide(1)->links('vendor.pagination.tailwind') }}
                {{-- </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
