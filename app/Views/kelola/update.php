<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1>Update Kamar</h1>
                    <ol class="breadcrumb">
                        <li>Kelola</li>
                        <li>Update Kamar</li>
                    </ol>
                </div>
                <div class="col-md-6 col-sm-6">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="room_page">
    <div class="container">
        <div class="col-6">
            <div class="sidebar">
                <aside class="widget">
                    <div class="vbf">
                        <h2 class="form_title"><i class="fa"></i>Update Kamar</h2>
                        <form method="post" action="/updating" class="inner" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <input class="form-control" name="idKamar" placeholder="<?= esc($list->id)?>" type="text" value="<?= esc($list->id)?>" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="namaKamar" placeholder="<?= esc($list->nama)?>" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="deskripsi" placeholder="<?= esc($list->deskripsi)?>" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="fasilitas" placeholder="<?= esc($list->fasilitas)?>" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="gambar" type="file">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="harga" placeholder="<?= esc($list->harga)?>" type="number">
                            </div>
                            <button class="button btn_lg btn_blue btn_full" type="button" data-toggle="modal" data-target="#myModal">Update Data
                                Kamar</button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">PERINGATAN!</h4>
                                        </div>
                                        <div class="modal-body">
                                            Apa Anda Yakin Ingin Mengubah Data Kamar Ini?
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
                </aside>
            </div>
        </div>
    </div>
    </div>
</main>