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
                <h1>Edit Akun</h1>
                <ol class="breadcrumb">
                    <li><a href="/profil">Profilku</a></li>
                    <li>Edit Akun</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- =========== MAIN ========== -->
    <main id="booking_page">
        <div class="container">
            <div class="row">
                <?php $session = session() ?>
                <div class="col-md-8">
                    <div id="booking_advanced">
                        <!-- ========== RESET FORM ========== -->
                        <div class="row">
                            <form action="/reset/input" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" placeholder=<?= $session->email; ?> required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" name="user" type="text" placeholder=<?= $session->user; ?> required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" placeholder=<?= $session->alamat; ?> required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input name="no_hp" type="tel" class="form-control" placeholder=<?= $session->no_hp; ?> required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" placeholder=<?= $session->password; ?> required>
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