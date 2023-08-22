<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with Rubic landing page.">
        <meta name="author" content="Devcrud">
        <title>Dashboard HCM | INACO</title>

        {{-- Datatable --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
        <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rubic.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('imgs/bar-chart.ico') }}">

        {{-- toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')

        <script src="{{ asset('vendors/jquery/jquery-3.4.1.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

        <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.affix.js') }}"></script>
        <script src="{{ asset('js/rubic.js') }}"></script>
        <script src="{{ asset('js/Chart.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/r-2.3.0/datatables.min.js"></script>

        {{-- toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @yield('script')
    </body>
</html>
