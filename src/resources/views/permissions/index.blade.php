@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column is-two-fifth">

            @include('yabe::permissions.partials.index.table')

        </div>

        <div class="column is-one-fifth">

            @if(isset($permission))

                @include('yabe::permissions.partials.edit.content')

            @else

                @include('yabe::permissions.partials.create.content')

            @endif

        </div>

        <div class="column">

            @if(isset($permission))

                @include('yabe::permissions.partials.edit.roles')

            @endif

        </div>

    </div>




@endsection
