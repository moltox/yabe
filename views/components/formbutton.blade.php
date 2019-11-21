<form action="{{ $route }}" method="POST">

    @csrf
    @method($method)
    <button type="submit" class="button {{ $colourClass }}">{!! $text !!}</button>

</form>
