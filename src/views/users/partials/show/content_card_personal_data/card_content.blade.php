<div class="content">

    @include('yabe::users.partials.show.content_card_personal_data.item', ['value' => $user->created_at, 'label' => __('yabe::words.signedup_at')])

    @include('yabe::users.partials.show.content_card_personal_data.item', ['value' => $user->updated_at, 'label' => __('yabe::words.updated_at')])

</div>

<div class="content">

    <p>TODO: Put custom fields here</p>

</div>


<div class="content">

    Show Permissions here

</div>


