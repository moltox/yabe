<div class="card">

    <header class="card-header">

        <p class="card-header-title is-capitalized">
            {{ Str::title( Str::plural( __('yabe::words.role' ))) }}
        </p>

    </header>

    <div class="card-content">

        <div class="content">

            <div class="box">

                @include('yabe::roles.partials.index.table')

            </div>

        </div>

    </div>

</div>

