<!DOCTYPE html>
<html>
<head>

    @include('yabe::layout.head')

</head>
<body>

@include('yabe::navbar_top.navbar')

<section class="section" style="margin: 0; padding: 0">

    <div class="mBreadcrumb has-background-white-ter">
        {{ Breadcrumbs::render() }}
    </div>

</section>
<section class="section has-background-white-ter">

    @yield('content')

</section>

<section class="section">

    @include('yabe::footer.footer')

</section>
</body>


</html>

