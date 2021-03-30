<?php
class MyData extends Controller{
    public function index()
    {
        $data['judul']='Data';
        $data['dt']=$this->model('Data_Model')->getAllMydata();

       $this->view('templates/header',$data);
       $this->view('myData/index',$data);
       $this->view('templates/footer');

    }
    public function detail($id)
    {
        $data['judul']='Detail Data';
        $data['dt']=$this->model('Data_Model')->getDataById($id);

       $this->view('templates/header',$data);
       $this->view('myData/detail',$data);
       $this->view('templates/footer');

    }
    public function edit($id){

        $data['judul'] = 'Edit Data';
        $data['dt'] = $this->model('User_model')->getAllMydataById($id);
        $this->view('templates/header', $data);
        $this->view('myData/edit', $data);
        $this->view('templates/footer');
       }
      
      
      
       public function tambahData(){
        $nama     = $_POST['nama'];
        $no_wa    = $_POST['no_wa'];
        $profesi = $_POST['profesi'];
        $alamat = $_POST['alamat'];
        $data['dt'] = $this->model('User_model')->tambahData($nama,$no_wa,$profesi,$alamat);
        // return $this->index();
        header('location:../myData');
       }
      
       public function updateData($id){  
        $id = $id;
        $nama     = $_POST['nama'];
        $no_wa    = $_POST['no_wa'];
        $profesi = $_POST['profesi'];
        $alamat = $_POST['alamat'];

        $data['dt'] = $this->model('User_model')->updateData($id,$nama,$no_wa,$profesi,$alamat);
        // return $this->index();
        header('location:../myData/detail/'.$id);
       }
      
       public function hapus($id){
        $data['dt'] = $this->model('User_model')->deleteData($id);
        // return $this->index();
        header('location:../../myData');
       }
}