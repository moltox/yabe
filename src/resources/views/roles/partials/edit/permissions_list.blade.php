<div class="list is-hoverable">

    @foreach($permissions as $key => $permission)

        @if( $role->hasPermissionTo( $permission ) )

            <a class="list-item is-active" href="{{ route('removePermissionFromRole', ['role' => $role, 'permission' => $permission, ]) }}">

                {{ $permission->name }}

            </a>

        @else

            <a class="list-item" href="{{ route('giveRolePermissionTo', ['role' => $role, 'permission' => $permission, ]) }}">

                {{ $permission->name }}

            </a>

        @endif

    @endforeach

</div>
