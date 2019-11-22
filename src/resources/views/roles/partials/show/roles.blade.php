<div class="card" style="width: fit-content; max-width: 100px">

    <div class="card-columns">

        <div class="column">

            @foreach($user->getRoleNames() as $roleName)

                @include('yabe::common.role_tag', ['roleName' => $roleName, ])

            @endforeach

        </div>

    </div>


</div>
