<div class="box">

    <div class="media">

        <div class="media-left">

            <span class="is-capitalized">{!! __('yabe::phrase.create_new_user') !!}</span>

        </div>

        <div class="media-content">

            <form id="personaldata" name="personaldata" action="{{ route('y_users.store') }}" method="POST">

                @csrf

                <div class="columns">

                    <div class="column">

                        <div class="field">

                            <div class="control has-icons-left">

                                <input name="name" class="input @if($errors->has('name')) is-danger @else is-primary @endif"
                                       type="text">

                                <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>

                            </div>

                            <label class="label is-capitalized"><small>{{ __('yabe::words.name') }}</small></label>

                            @if( $errors->has('name'))

                                @foreach($errors->get('name') as $msg)

                                    <p class="help is-danger">{{ $msg }}</p>

                                @endforeach

                            @endif

                        </div>

                        <div class="field">

                            <div class="control has-icons-left">

                                <input name="email"
                                       class="input @if($errors->has('email')) is-danger @else is-primary @endif"
                                       type="email" >

                                <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>

                            </div>

                            <label class="label"><small>{{ __('yabe::words.email') }}</small></label>

                            @if( $errors->has('email'))

                                @foreach($errors->get('email') as $msg)

                                    <p class="help is-danger">{{ $msg }}</p>

                                @endforeach

                            @endif

                        </div>

                        <div class="field">

                            <div class="control has-icons-left">

                                <input name="password"
                                       class="input @if($errors->has('password')) is-danger @else is-primary @endif"
                                       type="password" >

                                <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>

                            </div>

                            <label class="label is-capitalized"><small>{{ __('yabe::words.password') }}</small></label>

                            @if( $errors->has('password'))

                                @foreach($errors->get('password') as $msg)

                                    <p class="help is-danger">{{ $msg }}</p>

                                @endforeach

                            @endif

                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button formtarget="personaldata" class="button is-link is-capitalized">{{ __('yabe::words.save') }}</button>
                            </div>
                            <div class="control">
                                <button formtarget="personaldata" class="button is-link is-light is-capitalized">{{ __('yabe::words.cancel') }}</button>
                            </div>
                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>


</div>
