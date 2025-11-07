@props(['active' => false, 'type' => 'a'])

@if('a' === $type)
    <a {{ $attributes }}
        class="{{$active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}}  rounded-md  px-3 py-2 text-sm font-medium">{{ $slot }}</a>
@else
    <button {{ $attributes }}
        class="{{$active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}}  rounded-md  px-3 py-2 text-sm font-medium">{{ $slot }}</button>
@endif