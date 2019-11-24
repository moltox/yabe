@foreach($menus as $menu)

    <tr>

        <td>{{ $menu->active }}</td>
        <td>
            <div>{{ $menu->sequence }}</div>

            <div><a href="{{ route('moveMenuUp', ['menu' => $menu]) }}"><span class="has-text-success"><i class="fas fa-sort-up"></i></span></a></div>
            <div><a href="{{ route('moveMenuDown', ['menu' => $menu]) }}"><span class="has-text-danger"><i class="fas fa-sort-down"></i></span></a></div>

        </td>
        <td>@if($menu->parent){{ __('yabe::words.yes') }}@else{{ __('yabe::words.no') }}@endif</td>
        <td>{{ $menu->parent_name }}</td>
        <td><a href="{{ route('y_menus.edit', ['menu' => $menu]) }}">{{ $menu->name }}</a></td>
        <td><a href="{{ route('y_menus.edit', ['menu' => $menu]) }}">{{ $menu->title }}</a></td>
        <td>{{ $menu->url }}</td>
        <td>{!! $menu->menu_icon !!}</td>
        <td>{{ $menu->context }}</td>

    </tr>

@endforeach
