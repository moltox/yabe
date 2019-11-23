<div class="card">

    <header class="card-header">

        <p class="card-header-title">
           {{ Str::title( __('yabe::words.permission')) }}
        </p>

    </header>

    <div class="card-content">

        <div class="content">

            <div class="box">

                @include('yabe::roles.partials.edit.permissions_list', ['permissions' => \Spatie\Permission\Models\Permission::all()])

            </div>

        </div>

    </div>

    <footer class="card-footer">
        <div class="card-footer-item">&nbsp;</div>
        <div class="card-footer-item">&nbsp;</div>
        <div class="card-footer-item">

            {{ count( $role->permissions()->get() ) }}&nbsp;/&nbsp;{{ count(\Spatie\Permission\Models\Permission::all()) }}

        </div>

    </footer>

    </form>

</div>
