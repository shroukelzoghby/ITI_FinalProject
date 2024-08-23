<section {{ $attributes->class([ 'user__avatar__container' ]) }}>
    @if(!isset($picture) || is_null($picture))
        <img class="user__avatar" src="{{ Vite::image('user.webp') }}" alt="Profile picture" />
    @else
        <img class="user__avatar" src="{{ asset("storage/images/user_images/$picture") }}" alt="Profile picture" />
    @endif
</section>

