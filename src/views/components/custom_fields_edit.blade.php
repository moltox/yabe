@foreach($customFields as $cfg)


    @includeWhen($cfg['showInEditForm'] && $cfg['type'] === 'text', 'yabe::components.custom_field_edit_types.text', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInEditForm'] && $cfg['type'] === 'checkbox', 'yabe::components.custom_field_edit_types.checkbox', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInEditForm'] && $cfg['type'] === 'bulma_dropdown', 'yabe::components.custom_field_edit_types.bulma_dropdown', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

@endforeach
