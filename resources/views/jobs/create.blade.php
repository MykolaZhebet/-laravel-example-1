<x-ui-project-layout>
    <x-slot:heading>Create Job page</x-slot:heading>
    <form action="/jobs" method="POSt">
        @csrf
        <div>
            <label for="input-title">Title</label>
            <input type="text" name="title" placdeholder="put job title" required>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <label for="input-salary">Salary</label>
            <input type="text" name="salary" placdeholder="put job salary">
            @error('title')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Save</button>
    </form>

    @if($errors->any())
        <ul>
            @foreach ($errors as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</x-ui-project-layout>