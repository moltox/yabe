<tr>

    <td>{{ $user->id }}</td>
    <td>
        <a href="{{ route('y_users.show', ['user' => $user]) }}">{{ $user->name }}</a>
    </td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->created_at }}</td>
    <td>{{ $user->updated_at }}</td>

</tr>
