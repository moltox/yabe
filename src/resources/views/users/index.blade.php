@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column is-half is-offset-1">

            @include('yabe::users.partials.create.content')

        </div>

    </div>

    <div class="columns">

        <div class="column is-four-fifths is-offset-1">

            @include('yabe::users.partials.index.table')

        </div>

    </div>


@endsection
