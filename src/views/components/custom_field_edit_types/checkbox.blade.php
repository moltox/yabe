<div class="field">

    <div class="control has-icons-left">

        <label class="checkbox"><small>{{ __($cfg['caption']) }}</small>

            <input name="__cf__{{ $cfg['name'] }}"
                   class="@if($errors->has('name')) is-danger @else is-primary @endif"
                   type="checkbox" @if( isset($field->value) && ( $field->value == 'on' || $field->value == '1') ) checked="checked" @endif
                   value="1">

        </label>

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
