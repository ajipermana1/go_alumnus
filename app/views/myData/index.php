<div class="container mt-3">
 <div class="row">
  <div class="col-12">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>

<!-- Modal -->

   <h1>Data</h1>
   <ul class="list-group">
     <table class="table table-stripped">
      <thead>
       <tr>
        <th scope="col">Nama</th>
        <th scope="col" width="200px">Action</th>
       </tr>
      </thead>
      <tbody>
       <?php foreach ($data['dt'] as $dt) :?>
       <tr>
        <td><?= $dt['nama'];?></td>
        <td>
        <a href="<?php echo BASEURL;?>/myData/detail/<?php echo $dt['id'] ?>" class="badge bg-primary"><i class="far fa-eye">Detail</i></a>
  
         <a href="<?= BASEURL; ?>/myData/edit/<?= $dt['id'] ?>" class="badge bg-primary">Edit</a>
      <a href="<?= BASEURL; ?>/myData/hapus/<?= $dt['id'] ?>"  onclick="return confirm('Yakin?'); "class="badge bg-secondary">Hapus</a>
        </td>
       </tr>
       <?php endforeach; ?>
      </tbody>
     </table>    
   </ul>
  
  </div>
 </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?=BASEURL;?>/MyData/tambahData" method="POST">
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required=""
autocomplete="off" id="nama">
  </div>
  <div class="mb-3">
    <label for="no_wa" class="form-label">No Telepon</label>
    <input type="number" class="form-control" name="no_wa" placeholder="No Telepon (Whatsapp)" required=""
autocomplete="off" id="no_wa">
  </div>
  <div class="mb-3">
    <label for="profesi" class="form-label">Profesi</label>
    <input type="text" class="form-control" name="profesi" placeholder="Profesi" required=""
autocomplete="off" id="profesi">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required=""
autocomplete="off" id="alamat">
  </div>
  </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" >Batal</button>
        <button type="submit" class="btn btn-primary">Tambahkan!</button>
      </div>

  
</form>
     
    </div>
  </div>
</div>






