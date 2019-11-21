<div class="field">

    <div class="control has-icons-left">

        <input name="__cf__{{ $cfg['name'] }}"
               class="input @if($errors->has('name')) is-danger @else is-primary @endif"
               type="{{ $cfg['content_type'] }}"
               placeholder="{{ __($cfg['placeholder']) }}"

               @if(isset( $field->value ))
               value="{{ $field->value }}"
            @endif
        >

        @if( isset($cfg['icon']) && $cfg['icon'] !== '')

            <span class="icon is-small is-left">
            <i class="{!! $cfg['icon'] !!}"></i>
        </span>

        @endif
    </div>

    <label class="label"><small>{{ __($cfg['caption']) }}</small></label>

    @if( $errors->has($cfg['name']))

        @foreach($errors->get($cfg['name']) as $msg)

            <p class="help is-danger">{{ $msg }}</p>

        @endforeach

    @endif

</div>
