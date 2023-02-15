<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>{{ config('app.name') }} | {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->


    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/colors/blue.css') }}">

</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->

        <div class="clearfix"></div>
        <!-- Header Container / End -->

        {{ $slot }}

        <!-- Footer
================================================== -->

        <!-- Footer / End -->

    </div>
    <!-- Wrapper / End -->

    <!-- Scripts
================================================== -->
    <script src="{{ asset('assets/front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/mmenu.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/snackbar.js') }}"></script>
    <script src="{{ asset('assets/front/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/custom.js') }}"></script>

    <script>
        const userId = "{{ Auth::id() }}";
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
    <script>
        // Snackbar for user status switcher
        $('#snackbar-user-status label').click(function() {
            Snackbar.show({
                text: 'Your status has been changed!',
                pos: 'bottom-center',
                showAction: false,
                actionText: "Dismiss",
                duration: 3000,
                textColor: '#fff',
                backgroundColor: '#383838'
            });
        });
    </script>

</body>

</html>
