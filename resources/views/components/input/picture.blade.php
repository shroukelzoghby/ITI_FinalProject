<label {{ $attributes->class([ 'input--picture', 'button' ]) }} for="{{ "pic-$name" }}">
    {{ $slot }}
</label>
<input
    type="file"
    accept="image/*"
    id="{{ "pic-$name" }}"
    name="{{ $name }}"
    hidden @required($required ?? false)
/>

