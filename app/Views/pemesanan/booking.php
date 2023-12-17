<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6 col-sm-6">

                    <h1><?= esc($kamar->nama) ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/rooms">Daftar Kamar</a></li>
                        <li><?= esc($kamar->nama) ?></li>
                    </ol>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="price">
                        <div class="inner">
                            Rp<?= esc($kamar->harga) ?><span>bulanan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="slider">
                    <div id="slider-larg" class="owl-carousel image-gallery">
                        <!-- ITEM -->
                        <div class="item lightbox-image-icon">
                            <a href="uploads/<?= esc($kamar->gambar) ?>" class="hover_effect h_lightbox h_blue">
                                <img class="img-responsive" src="uploads/<?= esc($kamar->gambar) ?>" alt="Image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="main_title mt50">
                    <h2>TENTANG <?= esc($kamar->nama) ?></h2>
                </div>
                <p>
                    <?= esc($kamar->deskripsi) ?>
                </p>
                <div class="main_title t_style a_left s_title mt50">
                    <div class="c_inner">
                        <h2 class="c_title">Fasilitas</h2>
                    </div>
                </div>
                <div class="room_facilitys_list">
                    <div class="all_facility_list">
                        <div class="col-sm-4 nopadding">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check"></i>Double Bed</li>
                                <li><i class="fa fa-check"></i>80 Sq mt</li>
                                <li><i class="fa fa-check"></i>6 Persons</li>
                                <li><i class="fa fa-check"></i>Free Internet</li>
                            </ul>
                        </div>
                        <div class="col-sm-4 nopadding">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check"></i>Free Wi-Fi</li>
                                <li><i class="fa fa-check"></i>Breakfast Include</li>
                                <li><i class="fa fa-check"></i>Private Balcony</li>
                                <li class="no"><i class="fa fa-times"></i>Free Newspaper</li>
                            </ul>
                        </div>
                        <div class="col-sm-4 nopadding_left">
                            <ul class="list-unstyled">
                                <li class="no"><i class="fa fa-times"></i>Flat Screen Tv</li>
                                <li><i class="fa fa-check"></i>Full Ac</li>
                                <li class="no"><i class="fa fa-times"></i>Beach View</li>
                                <li><i class="fa fa-check"></i>Room Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i> PESAN ONLINE </h2>

                            <form class="inner" method="POST" action="/payment">
                                <div class="form-group">
                                    <div class="input-group date">
                                        <label for="booking-date">Pilih tanggal awal:</label>
                                        <input class="form-control" name="booking-date" type="date" />
                                    </div>
                                    <div class="form_select">
                                        <label for="booking-roomdate">Pilih Lama Kost:</label>
                                        <select name="booking-roomdate" class="form-control">
                                            <<<<<<< Updated upstream=======<option value="1 Bulan">1 Bulan</option>
                                                <option value="6 Bulan">6 Bulan</option>
                                                <option value="12 Bulan">12 Bulan</option>
                                                <option value="24 Bulan">24 Bulan</option>
                                                >>>>>>> Stashed changes
                                        </select>
                                    </div>
                                    <input type="hidden" value="<?= esc($kamar->id) ?>" name="room_data">
                                </div>
                                <button class="button btn_lg btn_blue btn_full" type="submit">PESAN KAMAR SEKARANG</button>
                            </form>

                        </div>
                    </aside>
                    <aside class="widget">
                        <h4>PERLU BANTUAN?</h4>
                        <div class="help">
                            Jika kamu memiliki pertanyaan jangan ragu untuk menghubungi kami
                            <div class="phone"><i class="fa  fa-phone"></i><a href="tel:18475555555"> 1-888-123-4567 </a></div>
                            <div class="email"><i class="fa  fa-envelope-o "></i><a href="mailto:contact@site.com">contact@site.com</a> or use <a href="contact.html"> formulir kontak</a></div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>