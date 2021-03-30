<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $sdata['nama']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $sdata['no_wa']; ?></h6>
            <p class="card-text"><?= $sdata['profesi']; ?></p>
            <p class="card-text"><?= $sdata['alamat']; ?></p>
            <a href="<?= base_url(); ?>MyData" class="card-link">Kembalii</a>
        </div>
    </div>
</div>