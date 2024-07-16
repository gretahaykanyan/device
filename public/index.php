<?php 
session_start();
require __DIR__ . "/../autoload.php";


$url=new Url();
$url->class->show();     


if(isset($_GET['email']) && $_GET['code']){
    $user = new \model\User();
    $user->verified($_GET['email'],$_GET['code']);
   
}   
if(isset($_GET['edit']) && isset($_GET['edit'])>0){
	$app = new \model\App;
	$fetchEdit =  $app->getById($_GET['edit']);
	echo"
	<script>
		var edit = new bootstrap.Modal(document.getElementById('edit'), {
			keyboard: false
		});
		
		document.querySelector('#editdevice').value = '$fetchEdit[Device]';
		document.querySelector('#editbrand').value = '$fetchEdit[Brand]';
		document.querySelector('#editmodel').value = '$fetchEdit[Model]';
		document.querySelector('#editprice').value = '$fetchEdit[Price]';
		document.querySelector('#editimg').src = 'uploads/$fetchEdit[Img]';
		document.querySelector('#editid').value = '$_GET[edit]';
		edit.show();
	</script>";
	
	if(isset($_POST['editdevice']) || isset($_POST['editbrand']) || isset($_POST['editmodel']) || isset($_POST['editprice']) ){
         
		$app->edit($_POST);
	}
}
if(isset($_GET['more']) && isset($_GET['more'])>0){
	$app = new \model\App;
	$fetchMore =  $app->getById($_GET['more']);

	echo"
		<script>
		var more = new bootstrap.Modal(document.getElementById('more'), {
			keyboard: false
		});
		
		document.querySelector('#moredevice').innerHTML = '$fetchMore[Device]';
		document.querySelector('#morebrand').innerHTML = '$fetchMore[Brand]';
		document.querySelector('#moremodel').innerHTML = '$fetchMore[Model]';
		document.querySelector('#moreprice').innerHTML = '$fetchMore[Price] Դր';
		document.querySelector('#moreimg').src = 'uploads/$fetchMore[Img]';
		more.show();
		</script>
	";
}
if(isset($_GET['rem']) && $_GET['rem']>0){
	
	$app = new \model\App;
	$app->delete($_GET['rem']);
	
}
if(isset($_GET['logout']) ){
	unset($_SESSION["uname"]);
	echo"
	<script>
		window.location.reload()
	</script>
	";
}


