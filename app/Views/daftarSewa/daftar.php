<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <h1>Daftar Sewa</h1>
            <ol class="breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li>Daftar Sewa</li>
            </ol>
        </div>
    </div>
</div>
    <style>
      /* =========== MAIN ========== */
      main {
            margin: 20px;
            padding: 20px;
            background-color: #f8f9fa; /* Warna background */
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6; /* Garis pemisah antar baris */
        }

        th {
            background-color: #007bff; /* Warna biru background header */
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa; /* Warna background untuk baris genap */
        }

        tbody tr:hover {
            background-color: #e9ecef; /* Warna background saat hover */
        }

        /* =========== OPTIONAL STYLES ========== */
        /* Menambahkan spasi di antara blok informasi terakhir dan element berikutnya (jika ada) */
        main:not(:last-child) {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- =========== MAIN ========== -->
<main>
    <table>
        <thead>
            <tr>
                <th style="width: 20%;">Harga</th>
                <th style="width: 20%;">Tanggal Awal</th>
                <th style="width: 20%;">Masa Berlaku</th>
                <th style="width: 20%;">Id Pelanggan</th>
                <th style="width: 20%;">Id Kamar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sewa as $l) : ?>
                <tr>
                    <td>Rp<?= esc($l->biaya) ?></td>
                    <td><?= esc($l->tanggal_awal) ?></td>
                    <td><?= esc($l->masa_berlaku) ?></td>
                    <td><?= esc($l->id_pelanggan) ?></td>
                    <td><?= esc($l->id_kamar) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

</body>
</html>