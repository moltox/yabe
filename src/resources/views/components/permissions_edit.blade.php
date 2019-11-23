<article class="panel is-primary">
    <p class="panel-heading is-capitalized">
        {{ Str::plural( __('yabe::words.permission') ) }}
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

                <h3>{{ Str::title( __('yabe::phrase.assigned_by_role') ) }}</h3>

                @include('yabe::components.permissions_edit.permissions_box', ['permissions' => $user->getPermissionsViaRoles(), 'mode' => 'none'])

                <h3>{{ Str::title( __('yabe::phrase.direct_permissions') ) }}</h3>

                @include('yabe::components.permissions_edit.permissions_box', ['permissions' => $user->getDirectPermissions(), 'mode' => 'remove'])

            </div>

            <div class="column is-one-fifth">

                &nbsp;

            </div>

            <div class="column is-two-fifth">

                <h3>{{ Str::title( __('yabe::phrase.unassigned_permissions') ) }}</h3>

                @include('yabe::components.permissions_edit.permissions_box', ['permissions' => $user->getUnassignedPermissions(), 'mode' => 'add'])

            </div>

        </div>

    </div>

</article>
