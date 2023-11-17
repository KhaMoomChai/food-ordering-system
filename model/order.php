<?php
include_once __DIR__. '/../vendor/db/db.php';

class Order{
    public function getOrderList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select orders.id as id,user.name as uname,user.email as email,
        user.address as address,orders.order_date as date,delivery.status as delivery_status
        from orders join user join delivery
        where orders.user_id=user.id and
        orders.id=delivery.order_id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;


    }
    public function getOrderListById($order_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select user.name as uname,user.email as email,product.name as product_name,product.price as price, 
        order_detail.qty as qty, orders.total_amount as total,
        user.address as address,orders.order_date as date,delivery.status as delivery_status,delivery_fee.fee as delivery_fee
        from orders join user join delivery join delivery_fee join product join order_detail
        where orders.id='$order_id' and orders.user_id=user.id and
        order_detail.product_id=product.id and order_detail.order_id='$order_id'
        and delivery.order_id='$order_id' and delivery_fee.id=delivery.delivery_fee_id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function deliveryStatusChange($order_id){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="update delivery set status=1 where order_id='$order_id'";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function reportOrderInfo($year,$month)
    {          
            $connection=Database::connect();
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="SELECT p.`id`, p.`name`, SUM(o.`qty`) AS quantity,o.tmonth as month
            FROM
            (SELECT product_id,table1.omonth as tmonth,qty FROM order_detail JOIN
            (SELECT id,month(orders.order_date)as omonth FROM orders WHERE month(order_date)=:month and year(order_date)=:year)as table1
            WHERE order_detail.order_id=table1.id)  AS o
                INNER JOIN `product` AS p
                ON o.`product_id` = p.`id`
            GROUP BY o.`product_id`
            ORDER BY SUM(o.`qty`) DESC, p.`name` ASC
            LIMIT 1";
            $statement=$connection->prepare($sql);
            $statement->bindParam(":year",$year);
            $statement->bindParam(":month",$month);
            if($statement->execute())
            {
                $result=$statement->fetch(PDO::FETCH_ASSOC);
                return $result ;
            }

    } 

    public function reportBetweenDate($start_date,$end_date)
    {          
            $connection=Database::connect();
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="SELECT p.name as product_name,SUM(od.qty * p.price) AS amount FROM orders o INNER JOIN order_detail od 
            ON o.id = od.order_id INNER JOIN product p ON od.product_id = p.id 
            WHERE o.order_date BETWEEN :start_date AND :end_date 
            GROUP BY product_name ORDER BY amount ASC LIMIT 100";
            $statement=$connection->prepare($sql);
            $statement->bindParam(":start_date",$start_date);
            $statement->bindParam(":end_date",$end_date);
            if($statement->execute())
            {
                $result=$statement->fetchall(PDO::FETCH_ASSOC);
                return $result ;
            }

    } 
    
    public function getMonthlyOrder()
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select year(order_date) as year,month(order_date) as month,
        count(orders.id) as id from orders
        group by concat(year(order_date),month(order_date))";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result; 
    }

    
}
?>
