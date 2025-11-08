<x-mail::message>
    # Introduction

    The body of your message.
    Your job <a href="{{ url('.jobs/' . $id) }}">{{ $title }}</a>
    is now live on our website
    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>