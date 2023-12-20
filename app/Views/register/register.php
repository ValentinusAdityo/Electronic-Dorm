<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <!-- =========== PAGE TITLE ========== -->
    <div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
        <div class="container">
            <div class="inner">
                <h1>Register Form</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Beranda</a></li>
                    <li>Register Form</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- =========== MAIN ========== -->
    <main id="booking_page">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div id="booking_advanced">

                        <div class="main_title a_left upper">
                            <h2>REGISTER</h2>
                        </div>
                        <!-- ========== REGISTER FORM ========== -->
                        <div class="row">
                            <form action="/register/input" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" name="nama" type="text" placeholder="Nama" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" placeholder="Masukan Alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input name="no_hp" type="tel" class="form-control" placeholder="No Handphone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Register" class="button btn_blue pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </main>



    </div>

    <!-- ========== BACK TO TOP ========== -->
    <div id="back_to_top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

    <!-- ========== NOTIFICATION ========== -->
    <div id="notification"></div>

    <!-- ========== JAVASCRIPT ========== -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/jquery.smoothState.js"></script>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/morphext.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.thumbs.min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/jPushMenu.js"></script>
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/countUp.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    </body>

</html>