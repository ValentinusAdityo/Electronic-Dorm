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
        <div class="row">
            <!-- KATEGORI -->
            <div class="col-md-4">
                <div class="text-center">
                    <h3>Kategori</h3>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <select class="form-select" name="kategori">
                    <option value="all">Harga Kamar</option>
                    <option value="mulai5">Mulai Rp 500.000</option>
                    <option value="mulai10">Mulai Rp 1000.000</option>
                </select>
            </div>
            </form>
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



<script>
    <?php
    $counter = 1;
    $jumKamar = 1;
    $jumlahKamar = count($list); // Anggap $list adalah array kamar Anda
    $kamarPerHalaman = 5;
    $halamanSaatIni = 1;
    ?>
    // Mengganti data contoh dengan data sesungguhnya
    const jumlahKamar = <?= $jumlahKamar ?>;
    const kamarPerHalaman = <?= $kamarPerHalaman ?>;
    let halamanSaatIni = <?= $halamanSaatIni ?>;

    // Fungsi untuk membuat kamar dan tombol
    function generateRoomsAndPagination() {
        const containerKamar = document.getElementById('roomContainer');
        const containerPagination = document.getElementById('pagination');
        containerKamar.innerHTML = ''; // Hapus kamar yang sudah ada
        containerPagination.innerHTML = ''; // Hapus tombol yang sudah ada

        const jumlahTombol = Math.ceil(jumlahKamar / kamarPerHalaman);
        for (let i = 1; i <= jumlahTombol; i++) {
            const elemenTombol = document.createElement('li');
            elemenTombol.className = 'page-item';
            const elemenLink = document.createElement('a');
            elemenLink.className = 'page-link';
            elemenLink.href = `javascript:void(0);`;
            elemenLink.textContent = i;
            elemenLink.addEventListener('click', () => tampilkanKamar(i));
            elemenTombol.appendChild(elemenLink);
            containerPagination.appendChild(elemenTombol);
        }

        tampilkanKamar(halamanSaatIni);
    }

    // Fungsi untuk menampilkan kamar-kamar tertentu berdasarkan klik tombol
    function tampilkanKamar(nomorTombol) {
        const containerKamar = document.getElementById('roomContainer');
        const tombolTombol = document.querySelectorAll('#pagination li');

        halamanSaatIni = nomorTombol;
        counter = (halamanSaatIni - 1) * kamarPerHalaman + 1; // Reset nomor kamar pada setiap halaman

        tombolTombol.forEach((tombol, indeks) => {
            if (indeks + 1 === halamanSaatIni) {
                tombol.classList.add('active');
            } else {
                tombol.classList.remove('active');
            }
        });

        const kamarAwal = (halamanSaatIni - 1) * kamarPerHalaman;
        const kamarAkhir = halamanSaatIni * kamarPerHalaman;

        containerKamar.childNodes.forEach((kamar, indeks) => {
            if (indeks >= kamarAwal && indeks < kamarAkhir) {
                if (kamar) {
                    kamar.style.display = 'block';
                    kamar.querySelector('.room_desc h5').textContent = `No: ${counter}`;
                    counter++;
                }
            } else {
                if (kamar) {
                    kamar.style.display = 'none';
                }
            }
        });
    }
    // Generasi awal
    generateRoomsAndPagination();
</script>