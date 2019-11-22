<tr>

    @include('yabe::components.custom_field_table_element_types.checkbox', ['cfg' => $customFields['active'], 'field' => $user->field( $customFields['active']['name'] ) ] )
    <td>{{ $user->id }}</td>
    <td>
        <a href="{{ route('y_users.show', ['user' => $user]) }}">{{ $user->name }}</a>
    </td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->created_at }}</td>
    <td>{{ $user->updated_at }}</td>
    @include('yabe::components.custom_fields_table_element', ['object' => $user])

</tr>
