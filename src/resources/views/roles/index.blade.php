@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column ">
            &nbsp;
        </div>

        <div class="column is-four-fifths">

            @include('yabe::roles.partials.index.table')

        </div>

        <div class="column">
            &nbsp;
        </div>

    </div>


@endsection
