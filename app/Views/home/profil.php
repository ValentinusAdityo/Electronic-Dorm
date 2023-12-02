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
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .info {
            text-align: left;
            color: #333;
            padding: 10px;
        }

        table {
            width: 80%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        p {
            margin: 5px 0;
            color: #555;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #1d6fa5;
        }

        .info h1,
        .info p {
            margin-bottom: 10px;
        }

        .info p:last-child {
            margin-bottom: 10px;
        }

    </style>
</head>


<body>
<div class="container">
        <div class="info">
            <h1>Data Pribadi</h1>
            <?php $session = session() ?>
            <table>
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?= $session->user; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $session->alamat; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $session->email; ?></td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td><?= $session->no_hp; ?></td>
                </tr>
            </table>
            <h1>Keamanan</h1>
            <a href="/reset">Reset Password</a>
            <h1>Kamar Yang Disewa</h1>
        </div>
    </div>
</body>

</html>