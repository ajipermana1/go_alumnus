<div class="container mt-3">
    <form action="<?= base_url(); ?>MyData/edit/<?= $sdata['id']; ?>" method="POST" enctype="multipart/form-data">
        <input class="form-control form-control-lg mt-2" type="text" readonly="true" name="nama" placeholder="Nama" value="<?= $sdata['nama']; ?>">
        <input class="form-control form-control-lg mt-2" type="number" name="no_wa" placeholder="No Telp" value="<?= $sdata['no_wa']; ?>">
        <input class="form-control form-control-lg mt-2" type="text" name="profesi" placeholder="Profesi" value="<?= $sdata['profesi']; ?>">
        <input class="form-control form-control-lg mt-2" type="text" name="alamat" placeholder="Alamat" value="<?= $sdata['alamat']; ?>">

        <input type="submit" value="simpan" class="btn btn-success mt-2">
        <a href="<?= base_url(); ?>myData" class="btn btn-primary mt-2">Kembalii</a>
    </form>
</div>