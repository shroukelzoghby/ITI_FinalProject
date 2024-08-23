<section {{ $attributes->class([ 'book__cover__container' ]) }}>
     @if(!isset($cover) || is_null($cover))
        <img
            class="book__cover"
            src="{{ Vite::image('book-opened.webp') }}"
            alt="Book cover"
        />
    @else
        <img
            class="book__cover"
            src="{{ asset("storage/images/book_images/$cover") }}"
            alt="Book cover"
        />
    @endif
</section>

