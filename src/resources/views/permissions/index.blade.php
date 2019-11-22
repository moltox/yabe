@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column is-three-fifth is-offset-2">

            @include('yabe::permissions.partials.index.table')

        </div>

        <div class="column is-one-fifth">



            @include('yabe::permissions.partials.create.content')

        </div>

    </div>


@endsection
