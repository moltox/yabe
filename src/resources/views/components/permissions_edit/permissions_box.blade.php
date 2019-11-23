<div class="mBox">

    @if(count($permissions) > 0)

        @foreach($permissions as $permission)

            @php

                $link = '';
                /** @var string $mode */
                if ($mode == 'remove')  {

                /** @var string $user */
                /** @var \Spatie\Permission\Models\Permission $permission */
                $link = route('removeDirectPermissionToUser', ['user' => $user, 'permission' => $permission]);

                } elseif($mode == 'add')  {

                $link = route('addDirectPermissionToUser', ['user' => $user, 'permission' => $permission]);

                }

            @endphp

            @include('yabe::common.role_tag',
             ['roleName' => $permission->name,
              'link' => $link
             ])

        @endforeach

    @else

        <p>No Permissions</p>

    @endif

</div>
