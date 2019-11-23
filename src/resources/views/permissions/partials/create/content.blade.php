<div class="card">

    <form action="{{route('y_permissions.store')}}" method="POST">

        @csrf

        <header class="card-header">

            <p class="card-header-title">
                {{ Str::title( __('yabe::phrase.create_permission')) }}
            </p>

        </header>

        <div class="card-content">

            <div class="content">

                <div class="box">

                    <div class="field">

                        <div class="control has-icons-left">

                            <input name="name"
                                   class="input @if($errors->has('name')) is-danger @else is-primary @endif"
                                   type="text">

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

                                    <option value="web">web</option>
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
                    <span class="is-capitalized">{{ __('yabe::words.save' ) }}</span></button>

            </div>

        </footer>

    </form>

</div>
