<!DOCTYPE html>
<html lang="en" style="overflow:hidden;">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BGam.es Browsergames</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta http-equiv="Refresh" content="5">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <style>
        @yield('style')
    </style>

</head>

<body style="overflow:hidden;background-image: url('/images/bg_red.png');background-size: cover;">

<div class="d-flex justify-content-between" style="height: 27px;">
    <div class="p-0 ">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" style="color:white;font-weight: 900;text-shadow: 1px 1px black;height: 25px;padding-top: 0px;"
                   href="https://join.die-ewigen.com/accounts" target="_parent" title="Accountverwaltung"><i class="bi bi-globe2"></i></a>
            </li>
            @foreach($Servers as $Server)
                @if( $Server->getData($User->user_id)['Login'] )
                    <li class="nav-item" role="presentation" style="border-radius: 3px 10px 5px 10px;">
                        <a class="nav-link" style="color:white;font-weight: 900;text-shadow: 1px 1px black;height: 25px;padding-top: 0px;"
                           href="https://join.die-ewigen.com/accounts/{{ $Server->server }}/join" target="_parent">{{ $Server->server }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
        <!-- Tabs navs -->
    </div>
    <div class="p-0 d-flex">
    </div>
    <div class="p-0 ">
{{--        <a class="btn btn-link btn-sm text-dark" href="/login">Einloggen</a>--}}
{{--        <a class="btn btn-link btn-sm text-dark" href="/register">Registrieren</a>--}}
    </div>
</div>

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
        trigger: 'focus'
    })
</script>

</body>

</html>
