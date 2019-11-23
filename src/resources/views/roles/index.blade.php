@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column is-one-third">

            @include('yabe::roles.partials.index.card')

        </div>

        <div class="column is-two-third">

            <div class="columns">

                <div class="column">

                    @if(isset($role))

                        @include('yabe::roles.partials.edit.content')

                    @else

                        @include('yabe::roles.partials.create.content')

                    @endif

                </div>

                <div class="column">

                    @includeWhen(isset($role), 'yabe::roles.partials.edit.permissions')

                </div>

                <div class="column">

                    @includeWhen(isset($role), 'yabe::roles.partials.edit.users')

                </div>

            </div>


        </div>

    </div>




@endsection
