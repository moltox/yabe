<table class="table">

    <thead>

    @include('yabe::permissions.partials.index.table_head')

    </thead>

    <tbody>

    @include('yabe::permissions.partials.index.table_body')

    </tbody>



</table>
{{ $permissions->links('yabe::components.pagination') }}
