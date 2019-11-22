<div class="field">

    <div id="__cf__{{ $cfg['name'] }}" class="control has-icons-left">

        <label class="radio" for="__cf__{{ $cfg['name'] }}">

            {{ __($cfg['caption']) }}

        </label>

        @foreach( $cfg['values'] as $short => $value )

            <label class="radio">

                <input name="__cf__{{ $cfg['name'] }}"
                       class="@if($errors->has('name')) is-danger @else is-primary @endif"
                       type="radio"
                       @if( isset($field->value) && ( $field->value == $short ) )
                       checked="checked"
                       @endif
                       value="{{ $short }}"
                />&nbsp;{{ __( $value ) }}

            </label>

        @endforeach

        @if( isset($cfg['icon']) && $cfg['icon'] !== '')

            <span class="icon is-small is-left">
            <i class="{!! $cfg['icon'] !!}"></i>
        </span>

        @endif
    </div>


    @if( $errors->has($cfg['name']))

        @foreach($errors->get($cfg['name']) as $msg)

            <p class="help is-danger">{{ $msg }}</p>

        @endforeach

    @endif

</div>
