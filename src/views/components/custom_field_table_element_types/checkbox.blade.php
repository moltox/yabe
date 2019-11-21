<td>
@if( isset($field->value) && ($field->value == '1'))

    <span class="icon is-small has-text-success">
        <i class="fas fa-check"></i>
    </span>

@else

    <span class="icon is-small has-text-danger">
        <i class="fas fa-times is-danger"></i>
    </span>

@endif
</td>
