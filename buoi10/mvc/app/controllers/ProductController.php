<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Category;
class ProductController extends BaseController{
    public function pt15112(){
        echo "xin chào, nguyễn bá hưng ";
            $products = Product::all();
            $soluong = count($products);
            echo "<br>số lưởng sẳn phẩm đang có trong db là :".$soluong;
    }
    public function delete(){

    	$id = $_GET['id']; // lấy id từ đường dẫn
    	Product::destroy($id);
    	header("location: " . BASE_URL . "?msg=Xóa thành công!");
    }
    public function addForm(){
    	$category = Category::all();
        $this->render('home.add', ['category' => $category]);
    }
    public function editForm(){
        $id = $_GET['id'];
        $model = Product::find($id);
        if(!$model){
            header("location: " . BASE_URL . "?msg=sản phẩm không tồn tại!");
        }
        $category = Category::all();

        include_once './app/views/home/edit.php';
    }
    public function saveAdd(){
        if(isset($_POST['submit'])){
        $error = array();
        $name = $_POST['name'];
        $price = $_POST['price'];
        $views = $_POST['views'];
        $star = $_POST['star'];
        $short_desc = $_POST['short_desc'];
        $detail = $_POST['detail'];
        if (empty($name&&$price&&$views&&$star&&$short_desc&&$detail)) {
            $error['no_name'] = "ban chua nhap ten"; 
             $error['no_price'] = "ban chua gia";
             $error['no_views'] = "ban chua nhap views";
             $error['no_star'] = "ban chua so sao";
             $error['no_mo_ta'] = "ban chua mo ta ngan";
             $error['no_detail'] = "ban chua nhap chi tiet";
            $this->render('home.add', ['error' => $error]);
        }
        else{
            $model = new Product();
        // gán dữ liệu cho model
        $model->fill($_POST);
        
        // upload ảnh
        $file = $_FILES['image'];
        if($file['size'] > 0){
            $filename = uniqid() . '-' . $file['name'];
            $destination = "./public/uploads/products/" . $filename;
            move_uploaded_file($file['tmp_name'], $destination);
            $model->image = ltrim($destination, './');
        }
        
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL . '');
        die;
        }

    }
	    $model = new Product();
        // gán dữ liệu cho model
        $model->fill($_POST);
        
        // upload ảnh
        $file = $_FILES['image'];
        if($file['size'] > 0){
            $filename = uniqid() . '-' . $file['name'];
            $destination = "./public/uploads/products/" . $filename;
            move_uploaded_file($file['tmp_name'], $destination);
            $model->image = ltrim($destination, './');
        }
        
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL . '');
        die;
    }

    public function saveEdit(){
        $id = $_GET['id'];
        $model = Product::find($id);
        if(!$model){
            header("location: " . BASE_URL . "?msg=sản phẩm không tồn tại!");
        }
        // gán dữ liệu cho model
        $model->fill($_POST);
        // upload ảnh
        $file = $_FILES['image'];
        if($file['size'] > 0){
            $filename = uniqid() . '-' . $file['name'];
            $destination = "./public/uploads/products/" . $filename;
            move_uploaded_file($file['tmp_name'], $destination);
            $model->image = ltrim($destination, './');
        }
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL . '');
        die;
    }
}
?>