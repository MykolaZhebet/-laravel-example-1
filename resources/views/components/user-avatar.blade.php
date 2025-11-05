@props(['user'])
@if($user->image)
    <img src="{{$user->imageUrl()}}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full" />
@else
    <img src="{{ Storage::url('/avatar.png')}}" alt="" class="w-12 h-12 rounded-full" />
@endif