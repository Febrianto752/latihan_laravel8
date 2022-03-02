@include('dashboard/layouts/header')

<div class="container-fluid">
    <div class="row">
        @include('dashboard/layouts/sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


            @yield('content')

        </main>
    </div>
</div>


<script src="/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="/js/dashboard.js"></script>
<script>
    document.addEventListener('trix-file-accept', function (event) {
        event.preventDefatult();
    })

</script>
</body>

</html>
