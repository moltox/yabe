<div style="margin-bottom: 10px">

    <div>@if(isset($field->value)){{ $field->value }}@endif</div>

    @if( !isset($cfg['hideLabelInShowView']) || $cfg['hideLabelInShowView'] != true )

        <label><small>{{ __( $cfg['caption'] ) }}</small></label>

    @endif

</div>
