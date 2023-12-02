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
        <div class="user-info">
            <br>
            <h1>Data Pribadi</h1>
            <!-- spasi -->
        
            <?php $session = session() ?>
            <table>
  
    <tr>
        <td><strong>Nama Lengkap  &nbsp;</strong></td>
        <td><?= $session->user; ?></td>
    </tr>
    <tr>
        <td><strong>Alamat</strong></td>
        <td><?= $session->alamat; ?></td>
    </tr>
    <tr>
        <td><strong>Email</strong></td>
        <td><?= $session->email; ?></td>
    </tr>
    <tr>
        <td><strong>Telepon</strong></td>
        <td><?= $session->no_hp; ?></td>
    </tr>
</table>
<!-- spasi -->
                <p style="margin:5px; padding:15px;">&nbsp;&nbsp;&nbsp; 
            <h1>Keamanan</h1>
            <a href="/reset">Reset Password</a>
            <br>
            <h1>Kamar Yang Disewa</h1>
        </div>
    </div>
</body>

</html>