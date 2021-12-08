
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArqqaHR</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/versions.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="style.css">
<script>
function editselectemployee() {

  var s = document.getElementById("p-div");
  if (s.style.display === "none") {
    s.style.display = "block";
  }
}
function hideeditselectemployee() {
  var h = document.getElementById("p-div");
  if (h.style.display === "block") {
    h.style.display = "none";

  }
}
</script>
</head>
	<body class="barber_version" src='images/background.png'>

<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Projects.php");
require_once(__ROOT__ . "controller/pmcontroller.php");
require_once(__ROOT__ . "view/viewpm.php");

$model= new Projects();
$controller=new Pmcontroller($model);
$view = new viewpm($controller,$model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	if($_GET['action'] == "ediit"){
		echo '<script>alert('.$_GET['name'].');</script>';
		echo $view->editproject($_GET['name']);
	}
	else if($_GET['action'] =='insertfeedback'){
		$view->feedback($_GET['emp_id'],$_GET['p_name']);
	}
	else if($_GET['action'] =='viewemp'){
		echo $view->EmployeeView($_GET['name']);
	}
	else if($_GET['action'] =='active'){
		$view->active();
	}
	else if($_GET['action'] =='completed'){
		$view->completed();
	}
	else if($_GET['action'] =='cancelled'){
		$view->Deactivated();
	}
	else if($_GET['action'] =='AssignEmpPrj'){
		$controller->AssignEmpPrj();
	}
	else if($_GET['action'] =='delete'){
		$controller->delete();
	}
	else if($_GET['action'] == "deleteuser"){

		echo $controller->{$_GET['action']}();
	}
	else if($_GET['action'] == "insert"){
	  echo $view->addproject();
	}
  	else if($_GET['action'] == "confirmadd"){
		echo $controller->insert();
	}
	else if($_GET['action'] == "editAction"){
		$controller->edit();
	}
	else if($_GET['action'] == "view"){
		echo '<script>alert('.$_GET['name'].');</script>';
		echo $view->viewproject($_GET['name']);
	}
	else if($_GET['action'] == "removeemp"){
		if(isset($_POST['removeemp'])){
			$name = $_REQUEST['epid'];
			$controller->removeemp();
		    echo $view->output();
		}
  }
}
else if(isset($_POST['confirmadd'])){
	$controller->insert();
}
else{
	echo $view->output();
	}

?>
</body>
</html>
