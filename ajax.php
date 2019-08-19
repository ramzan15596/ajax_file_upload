<?php
$db = new PDO("mysql:host=localhost;dbname=ajax_file_upload","root","");
if(isset($_FILES['myfile']['name'])){
	$image_name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES["myfile"]["tmp_name"];
	$store = "img/";
	$allowed_ext = array("png","jpg");

	$exp = explode(".", $image_name);
	$end = end($exp);
	if(in_array($end, $allowed_ext)){
		move_uploaded_file($tmp_name, "$store/$image_name");
		$Query = $db->prepare("INSERT INTO file_uploaded(name) VALUES (?)");
		$Query->execute([$image_name]);
		if($Query){
			$Query2 = $db->prepare("SELECT name FROM file_uploaded ORDER BY id DESC");
			$Query2->execute();
			while($r = $Query2->fetch(PDO::FETCH_OBJ)):
				$name = $r->name;
				echo "<img src='img/$name' class='img-responsive' style='width: 200px;height: 150px;'>";
			endwhile;
		}
	}else{
		echo "Invalid Extension";
	}
}
?>