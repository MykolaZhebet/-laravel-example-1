<x-ui-project-layout>
    <x-slot:heading>Jobs page</x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}">
                    Title: {{ $job['title'] }} - Salary: {{ $job['salary'] }}
                </a>
            </li>
        @endforeach
    </ul>
</x-ui-project-layout>