<div class="field">

    <div class="control has-icons-left">

        <input name="name"
               class="input @if($errors->has($name)) is-danger @else is-primary @endif"
               type="text"
               @if (isset($value))
               value="{{ $value }}"
            @endif
        >
        @if (isset($iconClass))

            <span class="icon is-small is-left">

              <i class="{{ $iconClass }}"></i>

            </span>

        @endif
    </div>

    <label class="label is-capitalized"><small>{{ $label }}</small></label>

    @if( $errors->has($name))

        @foreach($errors->get($name) as $msg)

            <p class="help is-danger">{{ $msg }}</p>

        @endforeach

    @endif

</div>
