@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column">

            @include('yabe::menus.partials.index.menus')

        </div>

        <div class="column">

            @include('yabe::menus.partials.edit.content')

        </div>

    </div>

@endsection