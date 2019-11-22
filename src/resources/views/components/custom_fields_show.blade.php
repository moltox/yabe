@foreach($customFields as $cfg)


    @includeWhen($cfg['showInShowView'] && $cfg['type'] === 'text', 'yabe::components.custom_field_show_types.text', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInShowView'] && $cfg['type'] === 'checkbox', 'yabe::components.custom_field_show_types.checkbox', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInShowView'] && $cfg['type'] === 'bulma_dropdown', 'yabe::components.custom_field_show_types.bulma_dropdown', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInShowView'] && $cfg['type'] === 'radio', 'yabe::components.custom_field_show_types.radio', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

@endforeach
