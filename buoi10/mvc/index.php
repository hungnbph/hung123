<?php

$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './common/util.php';
require_once './vendor/autoload.php';
require_once './common/database.php'; // bắt buộc require sau vendor/autoload

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;


switch($url){
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'index':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'hello-pt15112-web':
        $ctr = new ProductController();
        $ctr->pt15112();
        break;
    case 'demo-layout':
        $ctr = new HomeController();
        $ctr->testLayout();
        break;
    case 'delete-product':
        $ctr = new ProductController();
        $ctr->delete();
        break;
    case 'add-product':
        $ctr = new ProductController();
        $ctr->addForm();
        break;
    case 'save-add':
        $ctr = new ProductController();
        $ctr->saveAdd();
        break;
    case 'save-edit':
        $ctr = new ProductController();
        $ctr->saveEdit();
        break;
    case 'edit-product':
        $ctr = new ProductController();
        $ctr->editForm();
        break;
    case 'category':
        $ctr = new HomeController();
        $ctr->category();
        break;
    case 'add-category':
        $ctr = new CategoryController();
        $ctr->addcategory();
        break;
        case 'save-category':
        $ctr = new CategoryController();
        $ctr->savecategory();
        break;
    case 'edit-category':
        $ctr = new CategoryController();
        $ctr->editcategory();
        break;
    case 'save-edit-category':
        $ctr = new CategoryController();
        $ctr->saveEditcategory();
        break;
    case 'delete-category':
        $ctr = new CategoryController();
        $ctr->deletecategory();
        break;
    default:
        echo "Đường dẫn không tồn tại";
        break;
}
?>