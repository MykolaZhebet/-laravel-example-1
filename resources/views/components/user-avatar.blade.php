@props(['user', 'size' => 'w-12 h-12'])
@if($user->image)
    <img src="{{$user->imageUrl()}}" alt="{{ $user->name }}" class="{{ $size }} rounded-full" />
@else
    <img src="{{ Storage::url('/avatar.png')}}" alt="" class="{{ $size }} rounded-full" />
@endif