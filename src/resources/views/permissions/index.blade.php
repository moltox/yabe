@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column is-two-fifth">

            @can('grant permission list')

                @include('yabe::permissions.partials.index.table')

            @endcan

        </div>

        <div class="column is-one-fifth">


            @if(isset($permission))

                @can('grant permission edit')

                    @include('yabe::permissions.partials.edit.content')

                @endcan

            @else
                @can('grant permission create')

                    @include('yabe::permissions.partials.create.content')

                @endcan

            @endif


        </div>

        <div class="column">

            @canany(['grant permission add to role', 'grant permission remove from role'])

                @if(isset($permission))

                    @include('yabe::permissions.partials.edit.roles')

                @endif

            @endcan

        </div>

    </div>




@endsection
