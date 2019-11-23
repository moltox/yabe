<div class="list is-hoverable">

    @foreach($users as $key => $user)

        @if( $user->hasRole( $role ) )

            <a class="list-item is-active has-icon-left" href="{{ route('removeUserFromRole', ['role' => $role, 'user' => $user, ]) }}">

                <span class="icon is-small" style="margin-right: 5px"><i class="fas fa-user-minus"></i></span>

                <span>{{ $user->name }}</span>

            </a>

        @else

            <a class="list-item" href="{{ route('addUserToRole', ['role' => $role, 'user' => $user, ]) }}">

                {{ $user->name }}

            </a>

        @endif

    @endforeach

</div>
