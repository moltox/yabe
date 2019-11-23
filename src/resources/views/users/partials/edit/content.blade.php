<div class="card">

        @csrf
        @method('PATCH')

        <div class="card-content">

            @include('yabe::users.partials.edit.personal_data')

        </div>

        <div class="card-content">

            @include('yabe::users.partials.edit.password_change')

        </div>

        <div class="card-content">

            @include('yabe::users.partials.edit.permissions')

        </div>

        <div class="card-content">

            @include('yabe::users.partials.edit.roles')

        </div>




</div>
