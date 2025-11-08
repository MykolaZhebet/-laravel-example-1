<x-ui-project-layout>
    <x-slot:heading>Edit Job page</x-slot:heading>
    <form action="/jobs/{{ $job->id }}" method="POST">
        @csrf
        @method("PATCH")
        <div>
            <label for="input-title">Title</label>
            <input type="text" name="title" placdeholder="put job title" required value="{{ $job->title }}">
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <label for="input-salary">Salary</label>
            <input type="text" name="salary" placdeholder="put job salary" value="{{ $job->salary }}">
            @error('title')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Update</button>
        <button href="/jobs" for="delete-form">Delete</button>

    </form>

    <form action="/jobs/{{ $job->id }}" method="POST" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

    @if($errors->any())
        <ul>
            @foreach ($errors as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</x-ui-project-layout>