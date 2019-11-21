<div class="card">
    <form action="{{ route('y_users.update', ['user' => $user]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                    </figure>
                </div>
                <div class="media-content">

                    <div class="columns">

                        <div class="column">

                            @include('yabe::components.custom_field_edit_types.checkbox', ['cfg' => $customFields['active'], 'field' => $user->field( 'active' ) ] )

                            <div class="field">

                                <div class="control has-icons-left">

                                    <input name="name" class="input @if($errors->has('name')) is-danger @else is-primary @endif" type="text" value="{{ $user->name }}">

                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>

                                </div>

                                <label class="label"><small>{{ __('yabe::words.Name') }}</small></label>

                                @if( $errors->has('email'))

                                    @foreach($errors->get('email') as $msg)

                                        <p class="help is-danger">{{ $msg }}</p>

                                    @endforeach

                                @endif

                            </div>

                            <div class="field">

                                <div class="control has-icons-left">

                                    <input name="email" class="input @if($errors->has('email')) is-danger @else is-primary @endif" type="email" value="{{ $user->email }}">

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
                                    <button class="button is-link">Submit</button>
                                </div>
                                <div class="control">
                                    <button class="button is-link is-light">Cancel</button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="card-content">

            Show Permissions here

        </div>


    </form>

</div>
