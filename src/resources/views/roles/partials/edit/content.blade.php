<div class="card">


    <header class="card-header">

        <p class="card-header-title">
            {{ Str::title( __('yabe::phrase.edit_role')) }}
        </p>

        @include('yabe::components.delete_button', ['url' => route('y_roles.destroy', ['role' => $role])])

    </header>

    <div class="card-content">

        <div class="content">

            <form id="role_edit" name="role_edit" action="{{ route('y_roles.update', ['role' => $role]) }}" method="POST">

                @csrf

                @method('patch')

                <div class="box">

                    <div class="field">

                        <div class="control has-icons-left">

                            <input name="name"
                                   class="input @if($errors->has('name')) is-danger @else is-primary @endif"
                                   type="text" value="{{ $role->name }}">

                            <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>

                        </div>

                        <label class="label is-capitalized"><small>{{ __('yabe::words.name') }}</small></label>

                        @if( $errors->has('name'))

                            @foreach($errors->get('name') as $msg)

                                <p class="help is-danger">{{ $msg }}</p>

                            @endforeach

                        @endif

                    </div>

                </div>

                <div class="box">

                    <div class="field">

                        <div class="control has-icons-left">

                            <div class="select">

                                <select name="guard_name"
                                        class="input @if($errors->has('name')) is-danger @else is-primary @endif">

                                    <option value="{{ $role->guard_name }}">{{ $role->guard_name }}</option>
                                    @foreach(config('auth.guards') as $guard => $values)

                                        <option value="{{ $guard }}">{{ $guard }}</option>

                                    @endforeach

                                </select>

                            </div>

                            <span class="icon is-small is-left">
                                       <i class="fas fa-shield-alt"></i>
                                    </span>

                        </div>

                        <label class="label"><small>Guard</small></label>

                        @if( $errors->has('guard'))

                            @foreach($errors->get('guard') as $msg)

                                <p class="help is-danger">{{ $msg }}</p>

                            @endforeach

                        @endif

                    </div>

                </div>

            </form>

        </div>

    </div>

    <footer class="card-footer">
        <a href="#" class="card-footer-item">&nbsp;</a>
        <a href="#" class="card-footer-item">&nbsp;</a>
        <div class="card-footer-item">

            <button onclick="document.role_edit.submit()" type="submit" class="button is-link">
                    <span class="icon">
                        <i class="fas fa-save"></i>
                    </span>
                <span class="is-capitalized">{{ __('yabe::words.save' ) }}</span></button>

        </div>

    </footer>

    </form>

</div>
