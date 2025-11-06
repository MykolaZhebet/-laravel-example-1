@props(['user'])
@auth

    <div {{ $attributes }} x-data="{
                            following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                            follow() {
                                this.following = !this.following
                                axios.post('/follow/{{ $user->id }}').then(res => {
                                    console.log(res.data)
                                    this.followersCount = res.data.followersCount
                                }).catch(err => {console.log(err)})
                            },
                            followersCount: {{ $user->followers()->count() }}
                        }" class="w-[320px] border-1 px-8">
        {{ $slot }}
    </div>
@endauth