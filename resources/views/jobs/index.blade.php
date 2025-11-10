<x-ui-project-layout>
    <x-slot:heading>Jobs listing page</x-slot:heading>
    @foreach ($jobs as $job)
        <div class="space-y-4">
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 mt-4 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer?->name }}</div>
                Title: {{ $job['title'] }} - Salary: {{ $job['salary'] }}
            </a>

            @foreach ($job->tags as $tag)
                Tag: <a href="/tags/{{ strtolower($tag->name) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    @endforeach
    {{ $jobs->links() }}

    @foreach ($tags as $tag)
        <a href="/tags/{{ strtolower($tag->name) }}">{{ $tag->name }}</a>
    @endforeach
</x-ui-project-layout>