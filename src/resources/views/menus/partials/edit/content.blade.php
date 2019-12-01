<article class="panel is-primary">

    <p class="panel-heading is-capitalized">

        {{  __('yabe::words.menu') }}

    </p>


    <div class="panel-block" style="margin-top: 60px">

        <form id="menu_edit" name="menu_edit" action="{{ route('y_menus.update', ['menu' => $menu]) }}" method="POST">

            @csrf
            @method('patch')


            <div class="columns">

                <div class="column">

                    @include('yabe::components.switch', [
            'id' => 'active',
            'checked' => $menu->active == true,
            'label' => __('yabe::words.active'),
            'name' => 'active'])

                </div>

                <div class="column">

                    @include('yabe::components.switch', [
            'id' => 'is_parent',
            'checked' => $menu->parent == true,
            'label' => __('yabe::words.is_parent'),
            'name' => 'parent'])

                </div>

            </div>


            <div class="columns">

                <div class="column">

                    <div class="field">

                        <div class="select">

                            <select id="parent_id" name="parent_id">

                                @foreach($parents as $parent)

                                    @if($parent->id == $menu->parent_id)

                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                                    @endif

                                @endforeach

                                @foreach($parents as $parent)

                                        @if($parent->id != $menu->parent_id)

                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                                        @endif


                                    @endforeach

                            </select>

                        </div>

                        <label for="context" class="label is-small is-capitalized">{{ __('yabe::words.parent') }}</label>

                    </div>

                </div>

            </div>


            @include('yabe::components.input_text', [
                'name' => 'name',
                'value' => $menu->name,
                'iconClass' => "fas fa-bars",
                'label' => __('yabe::words.name')

            ])

            @include('yabe::components.input_text', [
                'name' => 'title',
                'value' => $menu->title,
                'iconClass' => "fas fa-bars",
                'label' => __('yabe::words.title')

            ])

            @include('yabe::components.input_text', [
                'name' => 'url',
                'value' => $menu->url,
                'iconClass' => "fas fa-bars",
                'label' => __('yabe::words.url')

            ])

            @include('yabe::components.input_text', [
                'name' => 'context',
                'value' => $menu->context,
                'iconClass' => "fas fa-bars",
                'label' => __('yabe::words.context')

            ])


        </form>


    </div>

    <footer class="footer">

        <div class="columns">

            <div class="column">

                <div class="footer-item">

                    <button for="menu_edit" type="submit" class="button is-link" onclick="document.menu_edit.submit()">
                        Save
                    </button>

                </div>

            </div>

            <div class="column">

                <div class="footer-item">

                    <button type="cancel" class="button">Cancel</button>

                </div>

            </div>

        </div>

    </footer>

</article>
