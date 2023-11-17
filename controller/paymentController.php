<?php 
include_once __DIR__ . '/../model/payment.php';

class PaymentController extends Payment{
    
    public function getPayments(){
        return $this->getPaymentList();
    }
    public function addPayment($payment_type)
    {
        return $this->createPayment($payment_type);

    }

    public function getPayment($id)
    {
        return $this->getPaymentInfo($id);
    }

    public function editPayment($id,$payment_type)
    {
        return $this->updatePayment($id,$payment_type);
    }

    public function deletePayment($id)
    {
        return $this->deletePaymentInfo($id);
    }
}
?>