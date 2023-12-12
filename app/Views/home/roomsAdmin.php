<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <h1>Daftar Kamar</h1>
            <ol class="breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li>Daftar Kamar</li>
            </ol>
        </div>
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="rooms_list">
    <div class="container">

        <div class="vbf">
            <h2 class="form_title"><i class="fa"></i>Input Kamar</h2>
            <form method="post" action="/input" class="inner" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <input class="form-control" name="namaKamar" placeholder="Masukkan Nama Kamar" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Kamar" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" name="fasilitas" placeholder="Masukkan Fasilitas Kamar" type="text">
                </div>
                <div class="form-group">
                    <?= form_open_multipart('KelolaKamar/input') ?>
                    <input class="form-control" name="gambar" type="file">
                </div>
                <div class="form-group">
                    <input class="form-control" name="harga" placeholder="Masukkan Harga Kamar" type="number">
                </div>
                <button class="button btn_lg btn_blue btn_full" type="button" data-toggle="modal" data-target="#myModal">Input Data
                    Kamar</button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">PERINGATAN!</h4>
                            </div>
                            <div class="modal-body">
                                Apa Anda Yakin Ingin Menambah Kamar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                <button type="submit" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="a_center mt10">
                    <a href="booking-form.html" class="a_b_f"></a>
                </div>
            </form>
        </div>

        <div class="text-center ">
            <form action="/search" method="post">
                <?= csrf_field() ?>
                <input type="text" name="key" placeholder="Masukkan No Kamar" class="form-control "><br>
                <input type="submit" name="submit" value="Search" class="button btn_yellow upper">
            </form>
        </div><br>
        <?php
// Menentukan jumlah item per halaman
$itemPerPage = 5;

// Menghitung total item
$totalItems = count($list);

// Menghitung total halaman
$totalPages = ceil($totalItems / $itemPerPage);

// Mendapatkan halaman saat ini dari URL
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Menghitung item awal dan akhir untuk halaman saat ini
$startIndex = ($currentPage - 1) * $itemPerPage;
$endIndex = $startIndex + $itemPerPage - 1;

// Menampilkan item pada halaman saat ini
for ($i = $startIndex; $i <= $endIndex && $i < $totalItems; $i++) :
    $l = $list[$i];
?>
    <article class="room_list" cl>
        <!-- Konten item kamar -->
        <div class="row row-flex">
            <div class="col-lg-4 col-md-5 col-sm-12">
                <figure>
                    <a href="room.html" class="hover_effect h_link h_blue">
                        <img src="uploads/<?= esc($l->gambar) ?>" class="img-responsive" alt="Image">
                    </a>
                </figure>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="room_details row-flex">
                    <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                        <h5>No: <?= $i + 1 ?></h5><br>
                        <h3><a href="/<?= esc($l->id) ?>"> Kamar <?= esc($l->nama) ?> </a></h3>
                        <p><?= esc($l->deskripsi) ?></p>
                        <div class="room_services">
                            <i class="fa fa-wifi" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Free WiFi" data-original-title="WiFi"></i>
                            <i class="fa fa-television" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Plasma TV with cable Channel" data-original-title="Plasma TV"></i>
                            <i class="fa fa-cutlery" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Restaurant" data-original-title="Restaurant"></i>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                        <div class="room_price_inner">
                            <span class="room_price_number"> Rp<?= number_format(esc($l->harga), 0, "", ".") ?> </span>
                            <small class="upper"> per Bulan </small>
                            <a href="/<?= esc($l->id) ?>" class="button  btn_blue btn_full upper">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php endfor; ?>

<!-- Menampilkan tombol pagination -->
<div id="paginationContainer" class="text-center mt-4">
    <nav aria-label="Page navigation">
        <ul id="pagination" class="pagination justify-content-center">
            <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                <li class="page-item <?= $page == $currentPage ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
