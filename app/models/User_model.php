<?php

class User_model{
  
 private $table = 'data';
 private $db;
 private $nama='Aji Permana';


 public function __construct()
 {
  $this->db = new Database;
 }

 public function getUser()
 {
    return $this->nama;
}
 public function getAllData()
 {
  $this->db->query('SELECT * FROM ' . $this->table);
  return $this->db->resultSet();
 }

 public function getAllMydataById($id)
 {
  $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
  $this->db->bind('id',$id);
  return $this->db->single();
 }

 public function tambahData($nama,$no_wa,$profesi,$alamat)
 {
  $this->db->query('INSERT INTO ' . $this->table . '(nama, no_wa, profesi, alamat) VALUES(:nama, :no_wa, :profesi, :alamat)');
  $this->db->bind('nama',$nama);
  $this->db->bind('no_wa',$no_wa);
  $this->db->bind('profesi',$profesi);
  $this->db->bind('alamat',$alamat);

  $this->db->execute();
 }

public function updateData($id,$nama,$no_wa,$profesi,$alamat)
{
$this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, no_wa=:no_wa, profesi=:profesi, alamat=:alamat WHERE id=:id');
$this->db->bind('id',$id);
$this->db->bind('nama',$nama);
$this->db->bind('no_wa',$no_wa);
$this->db->bind('profesi',$profesi);
$this->db->bind('alamat',$alamat);

$this->db->execute();
}

 public function deleteData($id)
 {
  $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
  $this->db->bind('id',$id);
  $this->db->execute();
 }

}