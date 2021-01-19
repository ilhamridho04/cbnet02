<?php
include('../include/config.php');
include('../include/readcfg.php');

include_once('../lib/routeros_api.class.php');
include_once('../lib/formatbytesbites.php');

session_start();
// hide all error
error_reporting(0);

ob_start("ob_gzhandler");
// check url
$url = $_SERVER['REQUEST_URI'];

// load session MikroTik
$session = $_GET['session'];
$id = $_GET['id'];
$c = $_GET['c'];
$router = $_GET['router'];
$logo = $_GET['logo'];



// json response array
$response = array("error" => FALSE);
if ($id == "login" || substr($url, -1) == "p") {

  if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user == $useradm && $pass == decrypt($passadm)) {
      $_SESSION["mikhmon"] = $user;
		$response["error"] = FALSE;
        $response["user"]["user"]=$user["user"];
        $response["pass"]["pass"]=$pass["pass"];
        echo json_encode($response);
    
    } else {
      	$response["error"] = TRUE;
        $response["error_msg"] = "Login gagal. Password/Email salah";
        echo json_encode($response);
    }
  }
else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parameter (email atau password) ada yang kurang";
    echo json_encode($response);
}
}
?>