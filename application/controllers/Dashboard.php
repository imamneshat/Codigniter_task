<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {

        function __construct()
        {
            parent::__construct();

            $this->load->database();
            
            // $this->load->model('Register_Model');
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->library('upload');
        }	

        public function index()
        {
            $data['Title'] = 'Dashboard';
            
            $data['prtFecth']  = $this->db->query("SELECT * FROM product")->result();
            // $data['subFecth']  = $this->db->query("SELECT * FROM subject")->result();
            // $data['scrFecth']  = $this->db->query("SELECT * FROM Scores")->result();

            // $data['ALLFecth']  = $this->db->query("SELECT student.*, subject.* FROM subject LEFT JOIN student ON student.s_id = subject.s_id  WHERE student.status = 1")->result();
          
            $this->load->view('dashboard', $data);
        }

         public function productRecord()
        {
            exit();
            $name  = $this->input->post('name');
            $productno = $this->input->post('productno');
            $detail = $this->input->post('detail');
            $price = $this->input->post('price');

            $config = array(
                'file_name'=> time(),
                // 'overwrite'=>TRUE,
                'max_height'=> '800',
                'max_width'=> '1028',
                // 'encrypt_name' = FALSE,
                // 'remove_spaces' = TRUE,
                'allowed_types' => "gif|jpg|png|jpeg",
                'upload_path'=> './assets/img/',
                'max_size' => '24000000' 
            );
            $this->upload->initialize($config);

            $fileName = '';
            // $dd = $this->upload->do_upload('image');
            if($this->upload->do_upload('image')){

                $imageData = $this->upload->data();
                // $dataa['editInfo']->image;
                $fileName = $imageData['file_name'];
                // $record['img'] = $fileName; 
                // unlink($_SERVER['DOCUMENT_ROOT'].'/assests/img/'.$dataa['editInfo']->image);
                
            }

            $data = array(
                'name'=>$name,
                'productno'=>$productno,
                'details'=>$detail,
                'image'=> $fileName,
                'price'=> $price,
                'status'=> 1
            );

            print_r($data); exit();
            
            $sqlFecth = $this->db->query("SELECT * FROM product WHERE productno = '$productno'")->result();
           
            if(empty($sqlFecth)) {
                $sql = $this->db->insert('product', $data);
                if($sql == 1){

                    echo "<script language=\"javascript\">alert('Record Inserted');</script>";
                    $this->index();
                }else{
    
                    echo "<script language=\"javascript\">alert(' Record Not Insert');</script>";
                    $this->index();
                }
                
            }
            $this->index();
        }
        public function studentRecord()
        {
            $name  = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $dob = $this->input->post('dob');

            $data = array(
                'name'=>$name,
                'email'=>$email,
                'address'=>$address,
                'dob'=> $dob,
                'status'=> 1
            );
            $sqlFecth = $this->db->query("SELECT * FROM student WHERE email = '$email'")->result();
           
            if(empty($sqlFecth)) {
                $sql = $this->db->insert('student', $data);
                if($sql == 1){

                    echo "<script language=\"javascript\">alert('Record Inserted');</script>";
                    $this->index();
                }else{
    
                    echo "<script language=\"javascript\">alert(' Record Not Insert');</script>";
                    $this->index();
                }
                
            }
            $this->index();
        }

        public function subjectRecord()
        {
            $stname  = $this->input->post('stname');
            $subname = $this->input->post('subname');
            $Mmarks = $this->input->post('Mmarks');

            $data = array(
                'sname'=>$subname,
                's_id'=>$stname,
                'max_marks'=>$Mmarks,
                'status'=> 1
            );
            
            $sqlFecth = $this->db->query("SELECT * FROM subject WHERE sname = '$subname' AND s_id = '$stname'")->result();
           
            if(empty($sqlFecth) && $sqlFecth->sname != $subname) {

                $sql = $this->db->insert('subject', $data);

                if($sql == 1){

                    echo "<script language=\"javascript\">alert('Record Inserted');</script>";
                    $this->index();
                }else{
    
                    echo "<script language=\"javascript\">alert(' Record Not Insert');</script>";
                    $this->index();
                }
                
            }
            $this->index();
           

        }

        public function scoreRecord()
        {
            $stname  = $this->input->post('stname');
            $subname = $this->input->post('subname');
            $marks = $this->input->post('marks');

            $data = array(
                'student'=>$stname,
                'subject'=>$subname,
                'marks'=>$marks,
                'status'=> 1
            );
            
            $sqlFecth = $this->db->query("SELECT * FROM Scores WHERE subject = '$subname' AND student = '$stname' ")->result();
           
            if(empty($sqlFecth) && $sqlFecth->subject != $subname) {

                $sql = $this->db->insert('Scores', $data);

                if($sql == 1){

                    echo "<script language=\"javascript\">alert('Record Inserted');</script>";
                    $this->index();
                }else{
    
                    echo "<script language=\"javascript\">alert(' Record Not Insert');</script>";
                    $this->index();
                }
                
            }
            $this->index();
           

        } 
        
        public function studentEditRecord()
        {
            $id  = $this->input->post('id');
            $name  = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');


            $sqlFecth = $this->db->query("UPDATE student SET name = '$name', email = '$email', address = '$address' WHERE s_id = $id");
           
            if($sqlFecth == 1){

                echo "<script language=\"javascript\">alert('Record Updated');</script>";
                // $this->index();
                redirect(base_url('Dashboard'));
            }else{

                echo "<script language=\"javascript\">alert(' Record Not Updated');</script>";
                // $this->index();
                redirect(base_url('Dashboard'));
            }
                
            
            redirect(base_url('Dashboard'));
           

        } 

        public function recordDelete($id)
        {
            
            
            $sqlFecth = $this->db->query("UPDATE  student SET status = 0 WHERE s_id = '$id'");
           
            if($sqlFecth == 1){

                echo "<script language=\"javascript\">alert('Record Deleted');</script>";
                // $this->index();
                redirect(base_url('Dashboard'));
            }else{

                echo "<script language=\"javascript\">alert(' Record Not Deleted');</script>";
                // $this->index();
                redirect(base_url('Dashboard'));
            }
                
            
            redirect(base_url('Dashboard'));
           

        } 

        
       
    }
?>
