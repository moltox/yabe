@php

    if ( !isset($parentId) ) $parentId = 0;

@endphp

@foreach($menus as $key => $menu)

    @if($menu->parent_id == $parentId)

        @if($menu->parent)

            <div class="navbar-item has-dropdown is-hoverable">

                <a class="navbar-link is-capitalized">

                    {{ __($menu->title) }}

                </a>

                <div class="navbar-dropdown">

                    @include('yabe::components.navbar_menus', ['parentId' => $menu->id])

                </div>

            </div>

        @else

            @include('yabe::components.navbar_menus.navbar_item', ['menu' => $menu])

        @endif

    @endif

@endforeach
