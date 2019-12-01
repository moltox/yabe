@php

    if ( !isset($parentId) ) $parentId = 1;

@endphp

@foreach($menus as $key => $menu)



        @if($menu->parent)

            <div class="navbar-item has-dropdown is-hoverable">

                <a class="navbar-link is-capitalized">

                    {{ __($menu->title) }}

                </a>

                <div class="navbar-dropdown">

                    @include('yabe::components.navbar_menus', ['menus' => $menu->childs])

                </div>

            </div>

        @else

            @include('yabe::components.navbar_menus.navbar_item', ['menu' => $menu])

        @endif



@endforeach
