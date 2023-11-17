<?php
include_once __DIR__ .'/../model/delivery_fee.php';

class DeliveryfeeController extends DeliveryFee {

    public function getdelifee(){
        return $this->getdelifeeList();
    }
    public function addDelifee($city,$fee){
        return $this->addNewDelifee($city,$fee);
    }
    public function getDelifees($id){
        return $this->getDelifeeInfo($id);
    }

    public function editDelifee($id,$city,$fee){
        return $this->updateDelifee($id,$city,$fee);
    }
    public function deleteDelifee($id)
    {
        return $this->deleteDelifeeInfo($id);
    }
}
?>