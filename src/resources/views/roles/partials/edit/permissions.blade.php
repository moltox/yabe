<div class="card">

    <header class="card-header">

        <p class="card-header-title">
            TODO: Title
        </p>

    </header>

    <div class="card-content">

        <div class="content">

            <p>Assigned to Roles:</p>

            <div class="box">

                @include('yabe::roles.partials.edit.permissions_list', ['permissions' => \Spatie\Permission\Models\Permission::all()])

            </div>

        </div>

    </div>

    <footer class="card-footer">
        <a href="#" class="card-footer-item">&nbsp;</a>
        <a href="#" class="card-footer-item">&nbsp;</a>
        <div class="card-footer-item">

            <button type="submit" class="button is-link">
                    <span class="icon">
                        <i class="fas fa-save"></i>
                    </span>
                <span>{{ __('yabe::words.Save' ) }}</span></button>

        </div>

    </footer>

    </form>

</div>
