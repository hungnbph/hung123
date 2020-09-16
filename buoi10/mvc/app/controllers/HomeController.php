<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Category;

class HomeController extends BaseController{

    public function index(){
        $products = Product::all();
         $this->render('home.product',['products'=>$products]);
        // include_once './app/views/home/trang-chu.php';
    }
    // public function testLayout(){
    //     $this->render('layouts.main');
    // }
    public function category(){
    	$category=Category::all();
    	$this->render('home.category', ['category' => $category]);
    }

}

?>