
@foreach($customFields as $cfg)

    @includeWhen($cfg['showInTable'] && $cfg['type'] === 'text', 'yabe::components.custom_field_table_element_types.text', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInTable'] && $cfg['type'] === 'checkbox', 'yabe::components.custom_field_table_element_types.checkbox', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInTable'] && $cfg['type'] === 'bulma_dropdown', 'yabe::components.custom_field_table_element_types.bulma_dropdown', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

    @includeWhen($cfg['showInTable'] && $cfg['type'] === 'radio', 'yabe::components.custom_field_table_element_types.radio', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

@endforeach
