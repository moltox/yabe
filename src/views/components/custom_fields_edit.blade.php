@foreach($customFields as $cfg)

    @includeWhen($cfg['type'] === 'text', 'yabe::components.custom_field_edit_types.text', ['cfg' => $cfg, 'field' => $object->field( $cfg['name'] ) ] )

@endforeach
