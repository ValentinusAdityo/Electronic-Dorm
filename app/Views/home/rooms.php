

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
    <div class="row">
    <!-- KATEGORI -->
             <div class="col-md-4">
                <div class="text-center">
                    <h3>Kategori</h3>
                    </div>
            </div>
            <div class="col-md-3 text-center">
                <select class="form-select" name="kategori">
                    <option value="all">Harga Room</option>
                    <option value="mulai5">Mulai Rp 500.000</option>
                    <option value="mulai10">Mulai Rp 1000.000</option>
                </select>
                </div>
                    </form>
                </div><br>
<!-- spasi -->
                <p style="margin:20px; padding:15px;">&nbsp;&nbsp;&nbsp;         

   

     
 
<!-- ITEM -->



<?php
        $counter = 1;
        $jumKamar = 1;
        foreach ($list as $l) : ?>
        
    
            <article class="room_list" cl>
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
                                <h5>No: <?= $counter ?></h5><br>
                                <?php $counter++; ?>
                                <h3><a href="/<?= esc($l->id) ?>"> Kamar <?= esc($l->nama) ?> </a></h3>
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
                                    <a href="/<?= esc($l->id) ?>" class="button  btn_blue btn_full upper">Pesan Sekarang</a>
                                    <?php if ($jumKamar == 10) break;  ?>
                                    <?php $jumKamar++ ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach ?>
        
        
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