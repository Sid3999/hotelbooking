<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta name="description" content="Explore the pakistan with Booking-sbs.com. Big savings on rooms, hotels, car rentals, taxis and attractions – build your perfect trip on any budget." />
    <meta name="keywords" content="lodging, accommodation, hotel, Hotels, special offers, packages, specials, weekend breaks, city breaks, deals, budget, cheap, discount, savings" />
    <!-- Title -->
    <title>@yield('title') - {{ config('app.name') }}| Finds Best Rooms in Pakistan</title>
    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('website/style.css') }}">
    <!-- toster -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <!-- Google Tag Manager -->
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G3BCPLLBQ2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-G3BCPLLBQ2');
    </script>



    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-M3HTSS9');</script>
    <!-- End Google Tag Manager -->

    @yield('style')
    @yield('custom-style')

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- /Preloader -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M3HTSS9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

@yield('content')

@yield('scripts')
<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<script src="{{ asset('website/js/jquery.min.js') }}"></script>
<!-- Popper -->
<script src="{{ asset('website/js/popper.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
<!-- All Plugins -->
<script src="{{ asset('website/js/roberto.bundle.js') }}"></script>
<!-- Active -->
<script src="{{ asset('website/js/default-assets/active.js') }}"></script>
<!-- Toastr js -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
       $('body').on('click', '.wishlist', function () {
        $(this).find('i').toggleClass("fa-heart fa-heart-o");
        var hotel_id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: '{{ route('wishlist.store') }}',
            data: {
                'hotel_id': hotel_id,
                '_token': '{{ csrf_token() }}'
            },
            success: function (data) {
                toastr.info(data.success);
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            },
            error: function (data) {
                if(data.status == 401){
                    toast.warning('You need to login first');
                    setTimeout(function(){
                    window.location.href = "{{ route('login') }}";
                        
                    }, 1000);
                }
            }
        });
    });
</script>
@yield('custom-script')
</body>

</html>
