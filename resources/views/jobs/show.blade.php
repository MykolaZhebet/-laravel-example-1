<x-ui-project-layout>
    <x-slot:heading>Job page</x-slot:heading>
    <h2>{{ $job['title'] }}</h2>
    <p> This job pays {{ $job['salary'] }}</p>
    <p>
        @can('edit-job', $job)
            <a href="/jobs/{{ $job['id'] }}/edit">Edit job</a>
        @endcan
</x-ui-project-layout>