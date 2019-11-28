@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column is-one-third">

            @can('grant role list')

                @include('yabe::roles.partials.index.card')

            @endcan

        </div>

        <div class="column is-two-third">

            <div class="columns">

                <div class="column">

                    @if(isset($role))

                        @can('grant role edit')

                            @include('yabe::roles.partials.edit.content')

                        @endcan
                    @else

                        @can('grant role create')

                            @include('yabe::roles.partials.create.content')

                        @endcan

                    @endif

                </div>

                <div class="column">

                    @canany(['grant role give permission', 'grant role remove permission'])

                        @includeWhen(isset($role), 'yabe::roles.partials.edit.permissions')

                    @endcanany

                </div>

                <div class="column">

                    @can('grant user remove role')

                        @includeWhen(isset($role), 'yabe::roles.partials.edit.users')

                    @endcan

                </div>

            </div>


        </div>

    </div>




@endsection
