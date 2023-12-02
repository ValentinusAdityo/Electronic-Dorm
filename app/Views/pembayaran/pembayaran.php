<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg)">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1>Pembayaran</h1>
                    <ol class="breadcrumb">
                        <li>Dashboard</li>
                        <li>Pembayaran</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="room_page">
    <div class="container">
        <!-- <div class="table-responsive"> -->
        <table class="table table-hover ">
            <h2>Mohon Konfirmasi Pembayaran</h2><br>
            <?php $session = session() ?>
            <tbody>
                <tr>
                    <td>No Kamar</td>
                    <td><?= $room_data->id; ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?= $session->user; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $session->email; ?></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td><?= $session->no_hp ?></td>
                </tr>
                <tr>
                    <td>Awal Mulai</td>
                    <td><?= $date_start; ?></td>
                </tr>
                <tr>
                    <td>Masa Berlaku</td>
                    <td><?= $date_end; ?></td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td><select class="form-control" id="sel1">
                            <option>Dana</option>
                            <option>Ovo</option>
                            <option>Gopay</option>
                            <option>Transfer Bank</option>
                        </select></td>
                </tr>
                <tr>
                    <td>
                        <h3>Total Pembayaran</h3>
                    </td>
                    <td>
                        <h3>Rp. <?= $total; ?></h3>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <a href="/rooms" class="button btn_lg btn_grey">Batal</a>
            <form method="post" action="/bayar">
                <input type="hidden" value="<?= $room_data->id; ?>" name="id_kamar">
                <input type="hidden" value="<?= $date_start; ?>" name="tanggal_awal">
                <input type="hidden" value="<?= $date_end; ?>" name="masa_berlaku">
                <input type="hidden" value="<?= $total; ?>" name="biaya">
                <button class="button btn_lg btn_yellow" type="submit">Bayar Sekarang</button>
            </form>
        </div>
    </div>
    </div>
    </div>

</main>