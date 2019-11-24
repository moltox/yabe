<article class="panel is-primary" >

    <p class="panel-heading is-capitalized">

        {{  __('yabe::words.menu') }}

    </p>


    <div class="panel-block" style="margin-top: 60px">

        <form action="{{ route('y_menus.update', ['menu' => $menu]) }}" method="POST">

            @csrf
            @method('patch')

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


        </form>


    </div>

</article>
