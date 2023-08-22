<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Dashboard HCM</title>
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/rubic.css') }}">
	<link rel="icon" type="image/x-icon" href="{{ asset('imgs/bar-chart.ico') }}">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <section class="section" id="about">
        @auth
            <div class="tab-content">
                <div class="tab-pane fade show active" style="text-align:right; margin:auto 100px 20px 100px;" id="pills-home">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-primary mt-3">Logout</button>
                    </form>
                </div>
            </div>
        @endauth
        <div class="text-center" style="margin:0 auto 0 auto;">
            <iframe width="1140" height="1290" 
            src="https://ptinacofood-my.sharepoint.com/:x:/g/personal/aditya_welly_inacofood_com/EUEndJkDYhFLmCc1kPFh310BpzaFONlG1HOOEmAZtaZChw?e=aeSQJ2&action=embedview&wdbipreview=true&wdAllowInteractivity=True&wdHideSheetTabs=True&wdHideHeaders=True&ActiveCell=B3">
            </iframe>
        </div>
    </section>
    <footer class="footer py-4 bg-dark text-light"> 
        <div class="container text-center">
            <p class="mb-4 small">Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a href="#">HCM PT. Niramas Utama (INACO)</a></p>
            <div class="social-links">
                <a href="https://linkedin.com/company/pt-niramas-utama" class="link"><i class="ti-linkedin"></i></a>
                <a href="https://instagram.com/lifeatinaco" class="link" ><i class="ti-instagram"></i></a>
                <a href="https://youtube.com/channel/UC04oMOdHl8R7Ruu0ftxHWRQ" class="link"><i class="ti-youtube"></i></a>
            </div>
        </div>
    </footer>
	
	<!-- core  -->
    <script src="{{ asset('vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap 3 affix -->
	<script src="{{ asset('vendors/bootstrap/bootstrap.affix.js') }}"></script>

    <!-- Rubic js -->
    <script src="{{ asset('js/rubic.js') }}"></script>

</body>
</html>
