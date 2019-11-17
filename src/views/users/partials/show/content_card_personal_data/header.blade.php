<p class="card-header-title">&nbsp;</p>

<div class="navbar-item has-dropdown is-hoverable">

    <a class="navbar-link">

    </a>

    <div class="navbar-dropdown is-right">
        <a class="navbar-item">
            @include('yabe::components.formbutton', [
                'route' => route('y_users.edit', ['user' => $user]),
                'method' => 'GET',
                'colourClass' => 'is-info',
                'text' => 'Edit'
            ])
        </a>

        <a class="navbar-item">
            @include('yabe::components.formbutton', [
                'route' => route('y_users.destroy', ['user' => $user]),
                'method' => 'DELETE',
                'colourClass' => 'is-danger',
                'text' => 'Delete'
            ])
        </a>

    </div>

</div>


