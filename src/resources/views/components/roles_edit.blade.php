<article class="panel is-primary">
    <p class="panel-heading">
        {{ __('yabe::words.Role') }}
    </p>

    <p class="panel-tabs">
        <!-- Nav tabs -->
        <input type="checkbox" id="pic" name="nav-tab">
        <input type="checkbox" id="music" name="nav-tab">
        <input type="checkbox" id="video" name="nav-tab">
        <input type="checkbox" id="doc" name="nav-tab">

    <div class="panel-block" style="width: 100%">

        <div class="columns">

            <div class="column is-two-fifth">

                <h3>{{ Str::title(__('yabe::phrase.assigned_roles')) }}</h3>

                @include('yabe::components.roles_edit.roles_box', ['roles' => $user->roles()->get(), 'mode' => 'remove'])

            </div>

            <div class="column is-one-fifth">

                &nbsp;

            </div>

            <div class="column is-two-fifth">

                <h3>{{ Str::title( __('yabe::phrase.unassigned_roles') ) }}</h3>

                @include('yabe::components.roles_edit.roles_box', ['roles' => $user->getUnassignedRoles(), 'mode' => 'add'])

            </div>

        </div>

    </div>

</article>

