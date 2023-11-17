<?php
if(!isset($_SESSION)){ session_start();}
class User
{
    public $db;

    public function __construct()
    {
        {
            try {
                $this->db = new PDO("mysql: host=localhost; dbname=food_order","root", "");
            } catch (PDOException $e) {
                die("Connectionn failed to database server .$e");
            }
        }
    }
    public function changePassword($name,$p,$n_p,$c_n_p){
        $user_id=$_SESSION['my_login']['id'];

        $old_sql="select password from user where id='$user_id'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        $old_password=$old_row['password'];
        $enc_password=sha1($p);

        if($old_password==$enc_password){

            if($n_p==$c_n_p){

                $enc_new_password=sha1($n_p);
                $sql="update user set password='$enc_new_password', name='$name' where id='$user_id'";
                $result=$this->db->query($sql);

                if($result){
                    $_SESSION['info']="Changed Successfully!";

                }else{
                    $_SESSION['error']="Something wrong with change password.";
                }
                header("location: ../setting.php");

            }else{

                $_SESSION['error']="The current password not match.";
                header("location: ../setting.php");
            }

        }else{
            $_SESSION['error']="The current password not match.";
            header("location: ../setting.php");
        }



    }
    public function login($e,$p){
        //echo $e,$p;
        $old_sql="select * from user where email='$e'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(!empty($old_row)){

            $old_password=$old_row['password'];
            $new_password=sha1($p);

            if($old_password==$new_password){
                $_SESSION['my_login']=$old_row;
                header("location: ../menudetails.php");

            }else{
                $_SESSION['error']="Authentication failed.";
                header("location: ../login.php");
            }


        }else{
            $_SESSION['error']="The selected email is invalid.";
            header("location: ../login.php");
        }
    }

   public function register($name,$email,$password,$confirm_password,$address){

        //echo $name, $email,$password,$confirm_password;
       $old_sql="select email from user where email='$email'";
       $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);

       if(empty($old_row)){
            if($password==$confirm_password){

                $enc_password=sha1($password);
                    $sql="insert into user(name,email,password,address)
                        value('$name','$email','$enc_password','$address')";

                    $result=$this->db->query($sql);

                    if($result){

                        $_SESSION['info']="The user account have been created.";

                        }else{

                            $_SESSION['error']="The user account created failed.";
                        }
                        header("location: ../register.php");
                    
                    }else{
                    $_SESSION['error']="The password and comfirm password must match.";
                    header("location: ../register.php");
                     }

       }else{

           $_SESSION['error']="The selected email is exists.";
           header("location: ../register.php");
       }

   }


}

