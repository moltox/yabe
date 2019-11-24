<div class="field">

    <input id="{{ $id }}" type="checkbox" name="{{ $name }}" class="switch is-outlined"

           @if(isset($checked) && $checked == true )

           checked="checked"

           @endif
    >

    <label for="{{ $id }}">{{ $label }}</label>

</div>

