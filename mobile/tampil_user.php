<?php
session_start();
// hide all error
error_reporting(0);
// check url

ob_start("ob_gzhandler");

// load session MikroTik
$session = $_GET['session'];

  $_SESSION["$session"] = $session;
  $setsession = $_SESSION["$session"];

  $_SESSION["connect"] = "";

// time zone
  date_default_timezone_set($_SESSION['timezone']);

// lang
  include('../include/lang.php');
  include('../lang'.$langid.'.php');

// quick bt
  include('../include/quickbt.php');

// load config
  include('../include/config.php');
  include('../include/readcfg.php');

// theme  
  include('../include/theme.php');
  include('../settings/settheme.php');
  if ($_SESSION['theme'] == "") {
    $theme = $theme;
    $themecolor = $themecolor;
  } else {
    $theme = $_SESSION['theme'];
    $themecolor = $_SESSION['themecolor'];
  }

// routeros api
  include_once('../lib/routeros_api.class.php');
  include_once('../lib/formatbytesbites.php');
  $API = new RouterosAPI();
  $API->debug = false;
  $iphost = "192.168.100.101";
  $userhost = "ilhamridho";
  $passwdhost = "ilham1212";
  $API->connect($iphost, $userhost, $passwdhost);

  $getidentity = $API->comm("/system/identity/print");
  $identity = $getidentity[0]['name'];
  

// get variable
  $hotspot = $_GET['hotspot'];
  $hotspotuser = $_GET['hotspot-user'];
  $userbyname = $_GET['hotspot-user'];
  $removeuseractive = $_GET['remove-user-active'];
  $removehost = $_GET['remove-host'];
  $removecookie = $_GET['remove-cookie'];
  $removeipbinding = $_GET['remove-ip-binding'];
  $removehotspotuser = $_GET['remove-hotspot-user'];
  $removehotspotusers = $_GET['remove-hotspot-users'];
  $removeuserprofile = $_GET['remove-user-profile'];
  $resethotspotuser = $_GET['reset-hotspot-user'];
  $removehotspotuserbycomment = $_GET['remove-hotspot-user-by-comment'];
  $removeexpiredhotspotuser = $_GET['remove-hotspot-user-expired'];
  $enablehotspotuser = $_GET['enable-hotspot-user'];
  $disablehotspotuser = $_GET['disable-hotspot-user'];
  $enableipbinding = $_GET['enable-ip-binding'];
  $disableipbinding = $_GET['disable-ip-binding'];
  $userprofile = $_GET['user-profile'];
  $userprofilebyname = $_GET['user-profile'];
  $sys = $_GET['system'];
  $enablesch = $_GET['enable-scheduler'];
  $disablesch = $_GET['disable-scheduler'];
  $removesch = $_GET['remove-scheduler'];
  $macbinding = $_GET['mac'];
  $ipbinding = $_GET['addr'];
  $ppp = $_GET['ppp'];
  $secretbyname = $_GET['secret'];
  $enablesecr = $_GET['enable-pppsecret'];
  $disablesecr = $_GET['disable-pppsecret'];
  $removesecr = $_GET['remove-pppsecret'];
  $removepprofile = $_GET['remove-pprofile'];
  $removepactive = $_GET['remove-pactive'];
  $srv = $_GET['srv'];
  $prof = $_GET['profile'];
  $comm = $_GET['comment'];
  $serveractive = $_GET['server'];
  $report = $_GET['report'];
  $removereport = $_GET['remove-report'];
  $minterface = $_GET['interface'];


  $pagehotspot = array('users','hosts','ipbinding','cookies','log','dhcp-leases');
  $pageppp = array('secrets','profiles','active',);
  $pagereport = array('userlog','selling');

  $getprofile = $API->comm("/ip/hotspot/user/profile/print");
  $srvlist = $API->comm("/ip/hotspot/print");

  if (substr($hotspotuser, 0, 1) == "*") {
    $hotspotuser = $hotspotuser;
  } elseif (substr($hotspotuser, 0, 1) != "") {
    $getuser = $API->comm("/ip/hotspot/user/print", array(
      "?name" => "$hotspotuser",
    ));
    $hotspotuser = $getuser[0]['.id'];
    //if($hotspotuser == ""){echo "<b>Hotspot User not found</b>";}
  }
  // Variable penampung array sementara
$response_data = null;

  $getuser = $API->comm("/ip/hotspot/user/print");
  $userdetails [] = $getuser['.id'];
  $response_data[] = $getuser;
	// Cek apakah datanya null ?
	if (is_null($response_data)) {
		// jika ya, buat status untuk response jadi false
		$status = false;
	} else {
		// jika tidak, buat status untuk response jadi true
		$status = true;
	}
  // Bungkus data dalam array
  $response = $getuser;
	// Set type header response ke Json
  header('Content-Type: application/json');
  // tampilkan dan convert ke format json
  echo json_encode($response);
?>