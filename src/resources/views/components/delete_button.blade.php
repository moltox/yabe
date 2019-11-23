<form action="{{ $url }}" method="POST">

    @csrf

    @method('delete')

    <button type="submit" class="button is-danger is-outlined">

        <span>{{ Str::title( __('yabe::words.delete')) }}</span>

        <span class="icon is-small">

            <i class="fas fa-times"></i>

        </span>

    </button>

</form>
