<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="images/favicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Bostorek</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/stylee.css">
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    @vite(['resources/js/app.js'])
     
<style>
    .p{
        list-style: none!important;
    display: flex!important;
    justify-content: space-between;
    align-items: center;
    margin: 12px 15px  ;
    }
    .ow {
    color: #44b89d!important;

}
.btn_1 {
    background-color: #44b89d;
    border: 1px solid #44b89d;
    color: #fff;
    display: inline-block;
    padding: 11px 23px;
    text-transform: capitalize;
    line-height: 16px;
    font-size: 13px;
    font-weight: 500;
    border-radius: 5px;
    white-space: nowrap;
    -webkit-transition: .5s;
    transition: .5s;
}
.btn_1:hover {
    background-color: #fff;
    border: 1px solid #313f5a;
    color: #44b89d;
}
.table thead th {
    font-weight: 500;
    border-bottom: none;
}
/* .modal-backdrop.show {
    opacity: 0!important;
}
.modal-backdrop {
    position:static;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100vw;
    height: 100vh;
    background-color: #000;
} */
</style> 
</head>

<body>

    <div id="app">
        
        <header-component></header-component>
        <router-view></router-view>
        <example-component></example-component>

    
                    <!-- footer section -->
                    <footer class="footer_section">
                        <div class="container">
                            <p>
                                &copy; <span id="displayYear"></span> All Rights Reserved By
                                <a href="https://html.design/">Free Html Templates</a>
                            </p>
                        </div>
                    </footer>
                    <!-- footer section -->

                    <!-- jQery -->
                    <script src="js/jquery-3.4.1.min.js"></script>
                    <!-- bootstrap js -->
                    <script src="js/bootstrap.js"></script>
                    <!-- custom js -->
                    <script src="js/custom.js"></script>
                    <!-- Google Map -->
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
                    </script>
                    <!-- End Google Map -->
            <script src="js/jquery-ui.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/owl.carousel.min.js"></script>
                <script src="js/jquery.magnific-popup.min.js"></script>
                <script src="js/aos.js"></script>

                <script src="js/main.js"></script>
                <script src="js/js/jquery-3.3.1.min.js"></script>
                <script src="js/js/popper.min.js"></script>
                <script src="js/js/bootstrap.min.js"></script>
                <script src="js/js/main.js"></script>
                <script type="text/javascript" src="{{ asset('fontawesome-free-6.4.0-web/js/all.min.js') }}"></script>
    </div>
    
</body>

</html>
