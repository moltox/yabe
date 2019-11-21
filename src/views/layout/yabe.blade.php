<!DOCTYPE html>
<html>
<head>

    @include('yabe::layout.head')

</head>
<body>

@include('yabe::navbar_top.navbar')

<section class="section">

    {{ Breadcrumbs::render() }}

</section>
<section class="section">

    @yield('content')

</section>

<section class="section">

    @include('yabe::footer.footer')

</section>
</body>
</html>

