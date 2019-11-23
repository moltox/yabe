<nav class="navbar mNavbar is-primary" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
           data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>

    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item is-capitalized" href="{{ route('yabe') }}">
                {{ __('yabe::words.home') }}
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-capitalized">
                    {{ __('yabe::words.user') }}
                </a>

                <div class="navbar-dropdown">

                    <a class="navbar-item is-capitalized" href="{{ route('y_users.index') }}">
                        {{ Str::plural( __('yabe::words.user') ) }}
                    </a>

                    <a class="navbar-item is-capitalized" href="{{ route('y_roles.index') }}">
                        {{ Str::plural( __('yabe::words.role') ) }}
                    </a>

                    <a class="navbar-item is-capitalized" href="{{ route('y_permissions.index') }}">
                        {{ Str::plural( __('yabe::words.permission') ) }}
                    </a>

                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">

                    @guest

                        <a class="button is-light" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @else

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ Auth::user()->name }} <span class="badge"></span>
                            </a>

                            <div class="navbar-dropdown">

                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>

                    @endguest


                </div>

            </div>

        </div>

    </div>

</nav>