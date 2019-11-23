<div class="box">
    <table class="table">

        <thead>

        @include('yabe::users.partials.index.table_head')

        </thead>

        <tbody>

        @include('yabe::users.partials.index.table_body')

        </tbody>


    </table>
    {{ $users->links('yabe::components.pagination') }}
</div>
