<?php
class BaseModel
{
    public function __construct()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "php2";
        try {
            $this->conn = new PDO("mysql:host=$hostname;dbname=$dbname; charset=utf8", $username, $password);
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu <br>", $e->getMessage();
        }
    }
    //Lấy toàn bộ csdl của 1 bảng
    public static function listAll()
    {
        $model = new static;
        $sqlBuider = "Select * from $model->tableName";
        $stmt = $model->conn->prepare($sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        return $result;
    }
    //lấy 1 dòng dữ liệu
    public static function findOnce($id)
    {
        $model = new static;
        $sqlBuider = "select * from $model->tableName where id=:id";
        $stmt = $model->conn->prepare($sqlBuider);
        $stmt->execute(array('id'=>$id));
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        if(count($result)>0){
            return $result[0];
        }
        return false;
    }
    //Insert dữ liệu
    public function insert($arr){
        $sqlBuider = "INSERT INTO $this->tableName(";
        foreach($arr as $key=>$value){
            $sqlBuider .='`'.$key . '`,';
        }
        $sqlBuider = rtrim($sqlBuider, ',' ). ') VALUES(';
        foreach ($arr as $key =>$value){
            $sqlBuider .= ":$key,";

        }
        $sqlBuider = rtrim($sqlBuider, ',').')';
        // echo $sqlBuider;
        $stmt = $this->conn->prepare($sqlBuider);
        if ($stmt->execute($arr)){
            return true;
        }
        return false;
    }
    //update dữ liệu
    public function update($arr, $id){
        $sqlBuider = "UPDATE $this->tableName SET ";
        foreach($arr as $key=>$value){
            $sqlBuider .= "`$key`=:$key,";
        }
        $sqlBuider = rtrim($sqlBuider, ','). " where id=:id";
        $arr['id']= $id;
        $stmt = $this->conn->prepare($sqlBuider);
        if($stmt->execute($arr)){
            return true;
        }
        return false;
    }
    public function delete($id){
        $sqlBuider = 'DELETE FROM $this->tableName WHERE id=:id';
        $stmt = $this->conn->prepare($sqlBuider);
        if ($stmt->execute(['id'=>$id])) {
            return true;
        }
        return false;
    }
}