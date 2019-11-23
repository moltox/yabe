<div class="list is-hoverable">

    @foreach($roles as $key => $role)

        @if( $permission->hasRole($role) )

            <a class="list-item is-active" href="{{ route('revokePermissionFromRole', ['permission' => $permission, 'role' => $role]) }}">

                {{ $role->name }}

            </a>

        @else

            <a class="list-item" href="{{ route('addPermissionToRole', ['permission' => $permission, 'role' => $role]) }}">

                {{ $role->name }}

            </a>

        @endif

    @endforeach

</div>
