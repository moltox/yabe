<tr>

    <td>{{ $role->id }}</td>
    <td>
        <a href="{{ route('y_roles.edit', ['role' => $role]) }}">{{ $role->name }}</a>
    </td>
    <td>{{ $role->guard_name }}</td>
    <td>{{ $role->created_at }}</td>
    <td>{{ $role->updated_at }}</td>

</tr>
