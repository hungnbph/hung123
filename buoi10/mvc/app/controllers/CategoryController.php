<?php 
namespace App\Controllers;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends BaseController{
	 public function addcategory(){
	 	$this->render('home.add-category');
	 }
	 public function savecategory(){
        if(isset($_POST['submit'])){
        $error = array();
        $cate_name = $_POST['cate_name'];
        $show_menu = $_POST['show_menu'];
        if (empty($cate_name&&$show_menu)) {
            $error['no_cate_name'] = "ban chua nhap ten"; 
             $error['no_show_menu'] = "ban chua nhap";
            $this->render('home.add-category', ['error' => $error]);
        }
        elseif ($show_menu<0) {
            $error['nho_hon']="khong duoc nho hon 0";
            $this->render('home.add-category', ['error' => $error]);
        }
        else{
            $model= new Category();
        $model->fill($_POST);
        $model->save();
         header('location: ' . BASE_URL . 'category');
         die;
        }

    }
	 	
        
	 }
	 public function deletecategory(){

    	$id = $_GET['id']; // lấy id từ đường dẫn
    	Category::destroy($id);
    	header("location: " . BASE_URL .'category'."?msg=Xóa thành công!");
    }
    public function editcategory(){
    	$id = $_GET['id'];
        $model = Category::find($id);
        if(!$model){
            header("location: " . BASE_URL .'category'. "?msg=sản phẩm không tồn tại!");
        }
        include_once './app/views/home/edit-category.php';
    }
    public function saveEditcategory(){
    	$id = $_GET['id'];
        $model = Category::find($id);
        $model->fill($_POST);
        $model->save();
        header('location: ' . BASE_URL . 'category');
        die;
    }
}



 ?>