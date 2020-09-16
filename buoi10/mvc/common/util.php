<?php 
define('BASE_URL' , 'http://localhost/php2/buoi10/mvc/');
function getClientUrl($urlPath , $params = []){

	//tạo biến url = http://localhost:88/mvc/ + string được chuyền vào qua
	$url= BASE_URL . $urlPath;

	// nếu mảng params có giá trị => có tham số đường dẫn
	if (count($params) > 0) {
		// thêm dấu hỏi vào đường dẫn để đánh dấu bắt đầu thêm than số đường dẫn
		$url .="?";
		foreach ($params as $key => $value) {
			# code...
			$url .="$key=$value&";
		}
		$url = rtrim($url, "&");
	}
	return $url;
	
}
function getAssetUrl($assetUrl){
	return BASE_URL . "public/" .$assetUrl;
}


 ?>