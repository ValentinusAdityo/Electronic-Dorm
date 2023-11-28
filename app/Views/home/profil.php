<!DOCTYPE html>
<html>
<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background:  linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <h1>Profilku</h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Profilku</li>
            </ol>
        </div>
    </div>
</div>

<head>
    <title>Biodata Diri</title>
    <link rel="stylesheet" type="text/css" href="profil.css" />
</head>


<body>
    <div class="container">
        <div class="info">
            <br>
            <h1>Data Pribadi</h1>
            <?php $session = session() ?>
            <p>Nama Lengkap: <?= $session->user; ?></p>
            <p>Alamat: <?= $session->alamat; ?></p>
            <p>Email: <?= $session->email; ?></p>
            <p>Telepon: <?= $session->no_hp; ?></p>
            <br>
            <h1>Keamanan</h1>
            <a href="/reset">Reset Password</a>
            <br>
            <h1>Kamar Yang Disewa</h1>
        </div>
    </div>
</body>

</html>