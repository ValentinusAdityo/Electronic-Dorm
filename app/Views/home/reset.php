<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style>
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>

    <!-- =========== PAGE TITLE ========== -->
    <div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
        <div class="container">
            <div class="inner">
                <h1>Reset Password</h1>
                <ol class="breadcrumb">
                    <li><a href="/profil">Profilku</a></li>
                    <li>Reset Password</li>
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
                        <!-- ========== RESET FORM ========== -->
                        <div class="row">
                            <form action="/reset/input" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input name="password1" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input name="password2" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Reset" class="button btn_blue pull-right">
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