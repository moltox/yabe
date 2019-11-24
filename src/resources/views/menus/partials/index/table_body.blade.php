@foreach($menus as $menu)

<tr>

    <td>{{ $menu->active }}</td>
    <td>{{ $menu->sequence }}</td>
    <td>@if($menu->parent){{ __('yabe::words.yes') }}@else{{ __('yabe::words.no') }}@endif</td>
    <td>{{ $menu->parent_name }}</td>
    <td><a href="{{ route('y_menus.edit', ['menu' => $menu]) }}">{{ $menu->name }}</a></td>
    <td><a href="{{ route('y_menus.edit', ['menu' => $menu]) }}">{{ $menu->title }}</a></td>
    <td>{{ $menu->url }}</td>
    <td>{!! $menu->menu_icon !!}</td>
    <td>{{ $menu->context }}</td>

</tr>

    @endforeach
