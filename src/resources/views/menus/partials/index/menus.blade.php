<article class="panel is-primary">

    <p class="panel-heading is-capitalized">

        {{ Str::plural( __('yabe::words.menu') ) }}

    </p>


    <div class="panel-block" style="width: 100%">

        @include('yabe::menus.partials.index.table')

    </div>

</article>
