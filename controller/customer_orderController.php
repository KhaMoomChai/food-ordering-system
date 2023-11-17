<?php
include_once __DIR__ .'/../model/customer_order.php';

class customer_orderController extends Ordering{

    public function getCategories(){
        return $this->getCategoriesList();
    }
    public function getAllProducts(){
        return $this->getProductDetails();
    }
    public function getAllProductsByCategory($id){
        return $this->getProductsDetailByCategory($id);
    }

    public function getPostForCart($id){
        return $this->getPostsListForCart($id);
    }
    public function deliveryFee()
    {
        return $this->getDeliveryFee();
    }
    public function paymentType(){
        return $this->getPaymentType();
    }
    public function getUser($id){
        return $this->getUserInfo($id);
    }
    public function doCheckout($user_id,$totalAmount){
        return $this->Checkout($user_id,$totalAmount);
    }
   public function deliveryFeeById($id)
   {
        return $this->getDeliveryFeeById($id);
   }
    public function getUserOrder($user_id){
    return $this->getUserOrderList($user_id);
    }
    public function getUserOrderById($user_id,$order_id){
    return $this->getUserOrderListById($user_id,$order_id);
    }
}
?>