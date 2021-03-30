<div class="container mt-3">
 <form action="<?= BASEURL; ?>/MyData/updateData/<?= $data['dt']['id'];?>" method="POST" enctype="multipart/form-data">
  <input class="form-control form-control-lg mt-2" type="text" readonly="true" name="nama" placeholder="Nama" value="<?= $data['dt']['nama']; ?>">
  <input class="form-control form-control-lg mt-2" type="number" name="no_wa" placeholder="No Telp" value="<?= $data['dt']['no_wa']; ?>">
  <input class="form-control form-control-lg mt-2" type="text" name="profesi" placeholder="Profesi" value="<?= $data['dt']['profesi']; ?>">
  <input class="form-control form-control-lg mt-2" type="text" name="alamat" placeholder="Alamat" value="<?= $data['dt']['alamat']; ?>">

  <input type="submit" value="simpan" class="btn btn-success mt-2">
  <a href="<?= BASEURL; ?>/myData" class="btn btn-primary mt-2">Kembalii</a>
 </form>
</div>