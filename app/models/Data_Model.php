<?php

class Data_model {
    // private $myData = [
    //     [
    //         "nama"=>"Aji Permana",
    //         "no_wa"=>"08998294035",
    //         "alamat"=>"Cimpaeun"
            
    //     ],
    //     [
    //         "nama"=>"Farhan",
    //         "no_wa"=>"0897346733",
    //         "alamat"=>"Cimpaeun"
  
    //     ],
    //     [
    //         "nama"=>"Bima",
    //         "no_wa"=>"086768627356" ,
    //         "alamat"=>"Cimpaeun"

    //     ]

    // ];
 private $table = 'data';
 private $db;
 public function __construct()
 {
$this->db = new Database;
 }

    public function getAllMydata()
    {
       $this->db->query('SELECT * FROM '.$this->table);
       return $this->db->resultSet();

    }
    public function getDataById($id)
    {
      $this->db->query('SELECT * FROM ' .$this->table. ' WHERE id=:id');
      $this->db->bind('id', $id);
      return $this->db->single();
    }

    public function tambahData($nama, $no_wa, $profesi, $alamat)
    {
     $this->db->query('INSERT INTO ' . $this->table . '(nama, no_wa, profesi, alamat) VALUES(:nama, :no_wa, :profesi, :alamat)');
     $this->db->bind('nama',$nama);
     $this->db->bind('no_wa',$no_wa);
     $this->db->bind('profesi',$profesi);
     $this->db->bind('alamat',$alamat);

     $this->db->execute();
    }
   
   public function updateData($nama, $no_wa, $profesi, $alamat, $id)
   {
   $this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, no_wa=:no_wa, profesi=:profesi, alamat =:alamat WHERE id=:id');
   $this->db->bind('nama',$nama);
   $this->db->bind('no_wa',$no_wa);
   $this->db->bind('profesi',$profesi);
   $this->db->bind('alamat',$alamat);
   $this->db->bind('id',$id);

   $this->db->execute();
   }
   
    public function deleteMhs($id)
    {
     $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
     $this->db->bind('id',$id);
     $this->db->execute();
    }



}