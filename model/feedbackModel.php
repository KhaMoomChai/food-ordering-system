<?php
include_once __DIR__. '/../vendor/db/db.php';
//include_once __DIR__. '/feedbackController.php';

class Feedback{
    public function createFeedback($email,$feedback){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="insert into feedback(email,feedback) values (:email,:feedback)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':feedback',$feedback);
        if($statement->execute())
        {
            return true;
        }else{
            return false;
        }
        

    }
    public function getFeedbacksList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from feedback";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function getOrder($user_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from orders where user_id ='$user_id'";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        $order=true;
        if($result==null){
            $order=false;
        }
        return $order;
    }
    
}
?>