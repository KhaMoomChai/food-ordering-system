<?php
include_once __DIR__ .'/../model/order.php';

class OrderController extends Order {
    public function getOrder(){
        return $this->getOrderList();
    }
    public function getOrderById($order_id){
        return $this->getOrderListById($order_id);
    }
    public function delivered($id){
        return $this->deliveryStatusChange($id);
    }

    public function reportOrder($year,$month)
    {
        return $this->reportOrderInfo($year,$month);
    }

    public function reportDate($start_date,$end_date)
    {
        return $this->reportBetweenDate($start_date,$end_date);
    }

    public function monthlyOrder()
    {
        return $this->getMonthlyOrder();
    }
}
?>