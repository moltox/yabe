<article class="panel is-primary">
    <p class="panel-heading">
        {{ Str::title(__('yabe::phrase.change_password') ) }}
    </p>


    <div class="panel-block" style="width: 100%">

        <div class="column">

            <form id="changepassword" name="changepassword" action="{{ route('changePasswordForUser', ['user' => $user]) }}" method="POST">

                @csrf

                @method('PATCH')

                <div class="columns">

                    <div class="column">

                        <div class="field">

                            <div class="control has-icons-left">

                                <input name="password"
                                       class="input @if($errors->has('password')) is-danger @else is-primary @endif"
                                       type="password">

                                <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>

                            </div>

                            <label class="label"><small>{{ __('yabe::words.password') }}</small></label>

                            @if( $errors->has('password'))

                                @foreach($errors->get('password') as $msg)

                                    <p class="help is-danger">{{ $msg }}</p>

                                @endforeach

                            @endif

                        </div>

                    </div>


                    <div class="column">

                        <div class="field">

                            <div class="control has-icons-left">

                                <input name="password_confirmation"
                                       class="input @if($errors->has('password')) is-danger @else is-primary @endif"
                                       type="password">

                                <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>

                            </div>

                            <label class="label"><small>{{ __('yabe::words.password') }}</small></label>

                            @if( $errors->has('password'))

                                @foreach($errors->get('password') as $msg)

                                    <p class="help is-danger">{{ $msg }}</p>

                                @endforeach

                            @endif

                        </div>

                    </div>

                </div>

                <div class="columns">

                    <div class="column">

                        <button type="submit" formtarget="changepassword" class="button is-link">Aendern</button>

                    </div>

                </div>

            </form>

        </div>

    </div>


</article>


