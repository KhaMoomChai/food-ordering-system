<?php
//session_start();
if(!isset($_SESSION)){ session_start();}

class Ordering
{

    public $db;

    public function __construct()
    {
        //mysqli,pdo
        {
            try {
                $this->db = new PDO("mysql: host=localhost; dbname=food_order","root", "");
            } catch (PDOException $e) {
                die("Connectionn failed to database server .$e");
            }
        }
    }

    public function getCategoriesList(){
        $sql="select * from category";
        return $this->db->query($sql);
    }
    public function getProductDetails(){
        $sql="select * from product";
        return $this->db->query($sql);
    }
    public function getProductsDetailByCategory($cat_id){
        $sql="select * from product where cat_id='$cat_id'";
        return $this->db->query($sql);
    }
    public function getPostsListForCart($id){
        $sql="select * from product where id='$id'";
        return $this->db->query($sql);
    }
    public function getDeliveryFee(){
        $sql="select * from delivery_fee";
        return $this->db->query($sql);
    }
    public function getDeliveryFeeById($id){
        $sql="select * from delivery_fee where id='$id'";
        return $this->db->query($sql);
    }

    public function getPaymentType(){
        $sql="select * from payment";
        return $this->db->query($sql);
    }

    public function getUserInfo($id){
        $sql="select * from user where id='$id'";
        return $this->db->query($sql);
    }
    public function getUserOrderList($user_id){
        $sql="select orders.id as id, user.address as address,orders.order_date as date,delivery.status as delivery_status, delivery_fee.city_name as address
        from orders join user join delivery join delivery_fee
        where orders.user_id=$user_id and $user_id = user.id and
        orders.id=delivery.order_id and delivery_fee.id=delivery.delivery_fee_id";

        return $this->db->query($sql);


    }
    public function getUserOrderListById($user_id,$order_id){
        $sql="select orders.id as order_id, product.name as product_name,product.price as price, 
        order_detail.qty as qty, orders.total_amount as total, delivery_fee.city_name as address,
        orders.order_date as date,delivery.status as delivery_status,delivery_fee.fee as delivery_fee
        from orders join user join delivery join delivery_fee join product join order_detail
         where orders.id='$order_id' and orders.user_id='$user_id' and '$user_id'=user.id and
          order_detail.product_id=product.id and order_detail.order_id='$order_id' and
           delivery.order_id='$order_id' and delivery_fee.id=delivery.delivery_fee_id;";
        return $this->db->query($sql);
    }
   
    public function Checkout($user_id,$totalAmount){
        //user_id,order_date,total_amount,status
        $order_sql="insert into orders (user_id, total_Amount, order_date)
            values ('$user_id','$totalAmount',now())";

        $this->db->query($order_sql);
        $order_id=$this->db->lastInsertId();
        foreach ($_SESSION['cart'] as $id=>$qty){
            $old_sql="select * from product where id='$id'";
            $old_row=$this->db->query($old_sql);

                $sql="insert into order_detail (order_id, product_id, qty)
                values ('$order_id', '$id','$qty')";
                $this->db->query($sql);
            
        }
        
        $payment_id=$_SESSION['order']['payment_type'];
        $delivery_fee_id=$_SESSION['order']['delivery_fee_id'];
        $address=$_SESSION['order']['address'];
        $phone=$_SESSION['order']['phone'];
        $delivery="insert into delivery (delivery_fee_id, payment_id, order_id, status,phone)
            values ('$delivery_fee_id','$payment_id','$order_id','0','$phone')";
            $this->db->query($delivery);

        unset($_SESSION['order']);
        unset($_SESSION['cart']);
        
        header("location: thank.php");
    }
}
