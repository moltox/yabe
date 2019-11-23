<div class="media">
    <div class="media-left">
        <figure class="image is-48x48">
            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
        </figure>
    </div>
    <div class="media-content">

        <form id="personaldata" name="personaldata" action="{{ route('y_users.update', ['user' => $user]) }}" method="POST">

            <div class="columns">

                <div class="column">

                    @include('yabe::components.custom_field_edit_types.checkbox', ['cfg' => $customFields['active'], 'field' => $user->field( 'active' ) ] )

                    <div class="field">

                        <div class="control has-icons-left">

                            <input name="name" class="input @if($errors->has('name')) is-danger @else is-primary @endif"
                                   type="text" value="{{ $user->name }}">

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
                                   type="email" value="{{ $user->email }}">

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

                    @include('yabe::users.partials.edit.content_customfields')

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
