<tr>

    <th class="is-capitalized"><abbr title="{{ __('yabe::words.active') }}"></abbr>{{ __('yabe::words.active')[0] }}</th>
    <th class="is-capitalized">{{ __('yabe::words.sequence') }}</th>
    <th class="is-capitalized">{{ __('yabe::words.is_parent') }}</th>
    <th class="is-capitalized">{{ __('yabe::words.parent') }}</th>
    <th class="is-capitalized">{{ __('yabe::words.name') }}</th>
    <th class="is-capitalized">{{ __('yabe::words.title') }}</th>
    <th class="is-capitalized">{{ __('yabe::words.url') }}</th>
    <th class="is-capitalized">{{ __('yabe::words.icon') }}</th>
    <th class="is-capitalized">

        <div class="select">

            <select onchange="contextChanged(this.value)" id="menu_context" name="context">

                <option value="{{ $context }}">{{ $context }}</option>

                @foreach($contexts as $mContext)

                    @if($mContext['context'] != $context)

                        <option value="{{ $mContext['context'] }}">{{ $mContext['context'] }}</option>

                    @endif

                @endforeach

            </select>

        </div>


    </th>

</tr>
<script>

    function contextChanged(context) {

        document.location.href = "{{ route('y_menus.index') . "?context=" }}" + context;

    }


</script>
