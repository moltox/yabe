<tr>

    <td>{{ $permission->id }}</td>
    <td>
        <a href="{{ route('y_permissions.edit', ['permission' => $permission]) }}">{{ $permission->name }}</a>
    </td>
    <td>{{ $permission->guard_name }}</td>
    <td>{{ $permission->created_at }}</td>
    <td>{{ $permission->updated_at }}</td>

</tr>
