<span
    {{ $attributes->class([ 'a' ]) }}
    onclick="event.preventDefault();
                 document.getElementById('{{ $formId }}').submit();">
    {{ $slot }}
</span>

<form id="{{ $formId }}" action="{{ route($routeName, $routeParam) }}" method="POST" class="d-none">
    @csrf
    @method($method)
</form>

