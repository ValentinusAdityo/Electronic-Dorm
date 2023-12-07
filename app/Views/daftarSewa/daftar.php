<!-- =========== MAIN ========== -->
<main>
<div>
    <?php foreach ($sewa as $l) : ?>
    <p>
        Harga <?= esc($l->biaya) ?>
    </p>
    <p>
        Tanggal Awal <?= esc($l->tanggal_awal) ?>
    </p>
    <p>
        Masa Berlaku <?= esc($l->masa_berlaku) ?>
    </p>
    <p>
        Id Pelanggan <?= esc($l->id_pelanggan) ?>
    </p>
    <p>
        Id Kamar <?= esc($l->id_kamar) ?>
    </p>
    <br>
    <?php endforeach ?>
</div>
</main>