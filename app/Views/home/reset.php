<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- =========== PAGE TITLE ========== -->
    <div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
        <div class="container">
            <div class="inner">
                <h1>Password Reset Form</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Beranda</a></li>
                    <li>Password Reset</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- =========== MAIN ========== -->
    <main id="password_reset_page">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div id="password_reset_advanced">

                        <div class="main_title a_left upper">
                            <h2>PASSWORD RESET</h2>
                        </div>
                        <!-- ========== PASSWORD RESET FORM ========== -->
                        <div class="row">
                            <form action="/password_reset" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Reset Password" class="button btn_blue pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ========== BACK TO TOP ========== -->
    <div id="back_to_top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

    <!-- ========== NOTIFICATION ========== -->
    <div id="notification"></div>

    <!-- ========== JAVASCRIPT ========== -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Include other scripts as needed -->

    </body>

</html>