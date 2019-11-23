<tr>

    <th>ID</th>
    <th>{{ __( $customFields['active']['caption']) }}</th>
    <th class="is-capitalized">{{ __('yabe::words.name') }}</th>
    <th>{{ __('yabe::words.email') }}</th>
    <th>{{ __('yabe::words.created_at') }}</th>
    <th>{{ __('yabe::words.updated_at') }}</th>

    @foreach($customFields as $fieldIdx => $field)

        @if($field['showInTable'])
        <th>

            {{ __( $field['caption'] ) }}

        </th>
        @endif

    @endforeach

</tr>

