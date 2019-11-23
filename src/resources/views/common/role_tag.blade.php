<span class="tag is-success" style="min-width: 80px;">



    @if(isset($link) && $link != '')

        <a href="{{ $link }}" class="">

    @endif

            {{ $roleName }}

            @if(isset($link))

       </a>

    @endif

        <div class="delete is-small"></div>



</span>
