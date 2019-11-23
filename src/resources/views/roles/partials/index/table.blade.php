<table class="table">

    <thead>

    @include('yabe::roles.partials.index.table_head')

    </thead>

    <tbody>

    @include('yabe::roles.partials.index.table_body')

    </tbody>



</table>
{{ $roles->links('yabe::components.pagination') }}
