<a class="navbar-item is-capitalized"

   @if( !empty($menu->url))

      href="{{ url($menu->url) }}"

    @endif
>
    {{ __($menu->title) }}

</a>
