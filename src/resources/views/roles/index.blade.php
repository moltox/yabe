@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column is-two-fifth">

            @include('yabe::roles.partials.index.table')

        </div>

        <div class="column is-one-fifth">

            @if(isset($role))

                @include('yabe::roles.partials.edit.content')

            @else

                @include('yabe::roles.partials.create.content')

            @endif

        </div>

        <div class="column">

            @if(isset($role))

                @include('yabe::roles.partials.edit.permissions')

            @endif

        </div>

    </div>




@endsection
