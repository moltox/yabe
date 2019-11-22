<div class="mBox">

    @if(count($roles) > 0)

        @foreach($roles as $role)

            @php

                $link = '';
                /** @var string $mode */
                if ($mode == 'remove')  {

                /** @var string $user */
                /** @var \Spatie\Permission\Models\Permission $role */
                $link = route('removeRoleFromUser', ['user' => $user, 'role' => $role]);

                } elseif($mode == 'add')  {

                $link = route('addRoleToUser', ['user' => $user, 'role' => $role]);

                }

            @endphp

            @include('yabe::common.role_tag',
             ['roleName' => $role->name,
              'link' => $link
             ])

        @endforeach

    @else

        <p>No Roles</p>

    @endif

</div>
