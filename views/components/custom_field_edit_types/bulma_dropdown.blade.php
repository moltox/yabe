<div class="field">

    <div class="control has-icons-left">

        <div
            class="select @if($errors->has('name')) is-danger @else is-primary @endif"
            >

            <select
                id="select_{{ $cfg['name'] }}"
                name="__cf__{{ $cfg['name'] }}">

                @if( isset($field->value) )

                    <option value="{{ $field->value }}">{{ $cfg['values'][ $field->value ] }}</option>

                @elseif( isset( $cfg['default']))

                    <option value="{{ $cfg['default'] }}">{{ $cfg['values'][ $cfg['default'] ] }}</option>

                @endif

                @foreach( $cfg['values'] as $short => $country)

                    <option value="{{ $short }}">{{ $country }}</option>

                @endforeach

            </select>

        </div>


        @if( isset($cfg['icon']) && $cfg['icon'] !== '')

            <span class="icon is-small is-left">
            <i class="{!! $cfg['icon'] !!}"></i>
        </span>

            <label for="select_{{ $cfg['name'] }}" class="label"><small>{{ __($cfg['caption']) }}</small></label>

        @endif
    </div>


    @if( $errors->has($cfg['name']))

        @foreach($errors->get($cfg['name']) as $msg)

            <p class="help is-danger">{{ $msg }}</p>

        @endforeach

    @endif

</div>
