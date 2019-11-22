<div class="field">

    <div class="control has-icons-left">

        <input name="{{ config('custom_fields.config.leading_cf_field_pattern') . $cfg['name'] }}"
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

    @if( $errors->has( config('custom_fields.config.leading_cf_field_pattern') . $cfg['name']) )

        @foreach($errors->get( config('custom_fields.config.leading_cf_field_pattern') . $cfg['name'] ) as $msg )

            <p class="help is-danger">{{ str_replace( config('custom_fields.config.leading_cf_field_pattern'), '', $msg ) }}</p>

        @endforeach

    @endif

    <label class="label"><small>{{ __($cfg['caption']) }}</small></label>



</div>
