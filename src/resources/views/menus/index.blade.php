@extends('yabe::layout.yabe')

@section('content')

    <div class="columns">

        <div class="column">

            @include('yabe::menus.partials.index.menus')

        </div>

        <div class="column is-one-fifth">

            @includeWhen(isset($menu), 'yabe::menus.partials.edit.content')

            @includeWhen(!isset($menu), 'yabe::menus.partials.create.content')

        </div>

    </div>

@endsection

