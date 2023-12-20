<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (elemen head lainnya) ... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('pagination.js') ?>"></script>
</head>

<body>
    <!-- =========== PAGE TITLE ========== -->
    <div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
                  rgba(9,64,103, 1)), url('<?= base_url('images/page_title_bg.jpg') ?>');">
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
            <div class="row">
                <!-- KATEGORI -->
                <div class="col-md-4">
                    <div class="text-center">
                        <h3>Kategori</h3>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <form id="myForm" action="/rooms/filter" method="GET">
                        <select class="form-select" name="kategori" onchange="submitForm()">
                            <option value="all">Harga Kamar</option>
                            <option value="500000">Rp 500.000</option>
                            <option value="1000000">Rp 1.000.000</option>
                        </select>
                    </form>

                    <script>
                        function submitForm() {
                            var form = document.getElementById('myForm');
                            form.submit();
                        }
                    </script>
                </div>
                <!-- </form> <!-- Perhatikan: Form tag ditutup di dalam loop -->
            </div><br>
            <!-- spasi -->
            <p style="margin:10px; padding:15px;">&nbsp;&nbsp;&nbsp;

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
                for ($i = $startIndex; $i <= $endIndex && $i < $totalItems; $i++):
                    $l = $list[$i];
                    ?>
                <article class="room_list" cl>
                    <!-- Konten item kamar -->
                    <div class="row row-flex">
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <figure>
                                <a href="room.html" class="hover_effect h_link h_blue">
                                    <img src="<?= base_url('uploads/' . esc($l->gambar)) ?>" class="img-responsive"
                                        alt="Image">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <div class="room_details row-flex">
                                <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                                    <h5>No:
                                        <?= $i + 1 ?>
                                    </h5><br>
                                    <h3><a href="/<?= esc($l->id) ?>"> Kamar
                                            <?= esc($l->nama) ?>
                                        </a></h3>
                                    <p>
                                        <?= esc($l->deskripsi) ?>
                                    </p>
                                  
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                                    <div class="room_price_inner">
                                        <span class="room_price_number"> Rp
                                            <?= number_format(esc($l->harga), 0, "", ".") ?>
                                        </span>
                                        <small class="upper"> per Bulan </small>
                                        <a href="/<?= esc($l->id) ?>" class="button  btn_blue btn_full upper">Pesan
                                            Sekarang</a>
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
                        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                            <li class="page-item <?= $page == $currentPage ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $page ?>">
                                    <?= $page ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>

        </div>
    </main>
</body>

</html>