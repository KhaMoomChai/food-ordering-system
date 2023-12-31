<?php
include_once __DIR__. '/../vendor/db/db.php';

class Category{
    public function getCategoriesList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from category";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;

    }

    public function createCategory($name)
    {
                $con=Database::connect();
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql='insert into category(name) values (:name)';
                $statement=$con->prepare($sql);
                $statement->bindParam(':name',$name);
                if($statement->execute())
                {
                    return true;
                }
                else{
                    return false;
                }
    }

    
    public function getCategoryInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from category where id=:id';
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);

        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }                                                
    }

    public function updateCategory($id,$name)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='update category set name=:name where id=:id';
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            return true;
        }
        else{
            return false;
        }
    }

  
    public function deleteCategoryInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='delete from category where id=:id';
        $statement=$con->prepare($sql);
        $statement->bindParam('id',$id);
        try{
            $statement->execute();
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

}
?>