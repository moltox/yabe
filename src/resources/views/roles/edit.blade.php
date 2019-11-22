@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column ">
            &nbsp;
        </div>

        <div class="column is-three-fifths">

            @include('yabe::users.partials.edit.content')

        </div>

        <div class="column">
            &nbsp;
        </div>

    </div>


@endsection
