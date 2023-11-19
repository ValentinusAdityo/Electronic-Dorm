<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <h1>Rooms List View</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Rooms</li>
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
        <!-- ITEM -->

        <?php
        $counter = 1;
        foreach ($list as $l) : ?>

            <article class="room_list" cl>
                <div class="row row-flex">
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <figure>
                            <p href="room.html" class="hover_effect h_link h_blue">
                                <img src="uploads/<?= esc($l->gambar) ?>" class="img-responsive" alt="Image">
                            </p>
                        </figure>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="room_details row-flex">
                            <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                                <h5>No: <?= $counter ?></h5><br>
                                <?php $counter++; ?>
                                <h3><p href="/<?= esc($l->id) ?>"> Kamar <?= esc($l->nama) ?> </p></h3>
                                <p>
                                    <?= esc($l->deskripsi) ?>
                                </p>
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
                                    <form action="/update" method="GET">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="dataId" value="<?= esc($l->id)?>">
                                        <button class="button  btn_blue btn_full upper" type="submit">Edit</button>
                                    </form>
                                    <form action="/delete/<?= esc($l->id) ?>" method="DELETE">
                                        <button class="button  btn_blue btn_full upper" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach ?>
    </div>
</main>
<!-- PAGINATION -->
<div class="text-center mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
            <li class="page-item"><a class="page-link" href="?page=4">4</a></li>
                </ul>
            </nav>
    </div>

</div>