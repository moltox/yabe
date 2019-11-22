<div style="margin-bottom: 10px">

    @if( isset($field->value) && ($field->value == '1'))

        <span class="icon is-small has-text-success">
            <i class="fas fa-check"></i>
        </span>

    @else

        <span class="icon is-small has-text-danger">
            <i class="fas fa-times is-danger"></i>
        </span>

    @endif

    @if( !isset($cfg['hideLabelInShowView']) || $cfg['hideLabelInShowView'] != true )

        <label><small>{{ __( $cfg['caption'] ) }}</small></label>

    @endif

</div>
