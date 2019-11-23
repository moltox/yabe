<div class="card">

    <header class="card-header">

        <p class="card-header-title is-capitalized">
            {{ Str::plural( __('yabe::words.user')) }}
        </p>

    </header>

    <div class="card-content">

        <div class="content">

            <div class="box">

                @if(count($role->users()->get()))

                    @include('yabe::roles.partials.edit.users_list', ['users' => $role->users()->get()])

                @else

                    <p>{{ __('yabe::phrase.no_users_attached') }}</p>

                @endif

            </div>

        </div>

    </div>

    <footer class="card-footer">
        <div class="card-footer-item">&nbsp;</div>
        <div class="card-footer-item">&nbsp;</div>
        <div class="card-footer-item">

            {{ count( $role->users()->get() ) }}&nbsp;/&nbsp;{{ count($users) }}

        </div>

    </footer>

    </form>

</div>
