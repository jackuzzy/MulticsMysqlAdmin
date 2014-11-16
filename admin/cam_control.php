<?php 
session_start();
include"../config.inc.php";
include"../function.inc.php";
verifyAuth();

// Call logout function
if(isset($_GET['action']) && $_GET['action'] == "logout") {
logout();	
}

// Variable edit if need !!

include"var_cam_control.php";

// No edit 

if(isset($_GET['action']) && $_GET['action'] == "stopCCcam") {
	exec(" ../script/cccam_stop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "startCCcam") {
	exec(" ../script/cccam_start");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "restartCCcam") {
	exec(" ../script/cccam_restart");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "cccam_restart4am_stop") {
	exec("sudo ../script/cccam_restart4am_stop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "cccam_restart4am_start") {
	exec("sudo ../script/cccam_restart4am_start");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "dcelStop") {
	exec("sudo ../script/dcelStop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "dcelStart") {
	exec("sudo ../script/dcelStart");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "tsatStop") {
	exec("sudo ../script/tsatStop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "tsatStart") {
	exec("sudo ../script/tsatStart");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "srgStop") {
	exec("sudo ../script/srgStop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "srgStart") {
	exec("sudo ../script/srgStart");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky4Stop") {
	exec("sudo ../script/sky4Stop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky4Start") {
	exec("sudo ../script/sky4Start");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky3Stop") {
	exec("sudo ../script/sky3Stop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky3Start") {
	exec("sudo ../script/sky3Start");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky2Stop") {
	exec("sudo ../script/sky2Stop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky2Start") {
	exec("sudo ../script/sky2Start");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky1Stop") {
	exec("sudo ../script/sky1Stop");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "sky1Start") {
	exec("sudo ../script/sky1Start");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "restartAll") {
	exec("sudo ../script/restart_all");
	header("Location: cam_control.php");
}

if(isset($_GET['action']) && $_GET['action'] == "privStart") {
	exec("sudo ../script/privStart");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "privStop") {
	exec("sudo ../script/privStop");
	header("Location: cam_control.php");
}

if(isset($_GET['action']) && $_GET['action'] == "restartAllCfg") {
	exec("sudo ../script/restart_all_cfg");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "restartCCcamCfg") {
	exec("sudo ../script/restart_cccam_cfg");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "updateSID") {
	exec("sudo ../script/sid_update");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "updateOSCAM") {
	exec("sudo ../script/cam_update");
	header("Location: cam_control.php");
}
if(isset($_GET['action']) && $_GET['action'] == "updateCCcamCfg") {
	exec("sudo ../script/ftpUpdate");
	header("Location: cam_control.php");
}





// Value of active or disable cam

$CCcamStatus=exec("ps -ef | grep -v grep | grep -w $CCcam | wc -l");
$CCautoload=exec("cat /etc/crontab | grep '".$script_dir."load_cccam_config' | wc -l");
$sky_1=exec("ps -ef | grep -v grep | grep -w $Sky1 | wc -l");
$sky_2=exec("ps -ef | grep -v grep | grep -w $Sky2 | wc -l");
$sky_3=exec("ps -ef | grep -v grep | grep -w $Sky3 | wc -l");
$sky_4=exec("ps -ef | grep -v grep | grep -w $Sky4 | wc -l");
$srg_=exec("ps -ef | grep -v grep | grep -w $Srg | wc -l");
$tsat=exec("ps -ef | grep -v grep | grep -w $Tvsat | wc -l");
$dcel=exec("ps -ef | grep -v grep | grep -w $Dorcel | wc -l");
$priv=exec("ps -ef | grep -v grep | grep -w $Private | wc -l");

if($CCcamStatus >= "1") {
	$link_cccam_stop=$_SERVER['PHP_SELF']."?action=stopCCcam";
	$cccam_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_cccam="<a href='$link_cccam_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($CCcamStatus == "0") {
	$link_cccam_start=$_SERVER['PHP_SELF']."?action=startCCcam";
	$cccam_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_cccam="<a href='$link_cccam_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($CCautoload == "1") {
	$cccam_autore_stop=$_SERVER['PHP_SELF']."?action=cccam_restart4am_stop";
	$cccam_auto4am_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_cccam4am_rest="<a href='$cccam_autore_stop'><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($CCautoload == "0") {
	$cccam_autore_start=$_SERVER['PHP_SELF']."?action=cccam_restart4am_start";
	$cccam_auto4am_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_cccam4am_rest="<a href='$cccam_autore_start'><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}


if($priv >= "1") {
	$link_priv_stop=$_SERVER['PHP_SELF']."?action=privStop";
	$priv_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_priv="<a href='$link_priv_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($priv == "0") {
	$link_priv_start=$_SERVER['PHP_SELF']."?action=privStart";
	$priv_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_priv="<a href='$link_priv_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($dcel >= "1") {
	$link_dcel_stop=$_SERVER['PHP_SELF']."?action=dcelStop";
	$dcel_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_dcel="<a href='$link_dcel_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($dcel == "0") {
	$link_dcel_start=$_SERVER['PHP_SELF']."?action=dcelStart";
	$dcel_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_dcel="<a href='$link_dcel_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($tsat >= "1") {
	$link_tsat_stop=$_SERVER['PHP_SELF']."?action=tsatStop";
	$tsat_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_tsat="<a href='$link_tsat_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($tsat == "0") {
	$link_tsat_start=$_SERVER['PHP_SELF']."?action=tsatStart";
	$tsat_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_tsat="<a href='$link_tsat_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($srg_ >= "1") {
	$link_srg_stop=$_SERVER['PHP_SELF']."?action=srgStop";
	$srg_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_srg="<a href='$link_srg_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($srg_ == "0") {
	$link_srg_start=$_SERVER['PHP_SELF']."?action=srgStart";
	$srg_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_srg="<a href='$link_srg_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($sky_4 >= "1") {
	$link_sky4_stop=$_SERVER['PHP_SELF']."?action=sky4Stop";
	$sky4_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_sky4="<a href='$link_sky4_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($sky_4 == "0") {
	$link_sky4_start=$_SERVER['PHP_SELF']."?action=sky4Start";
	$sky4_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_sky4="<a href='$link_sky4_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($sky_3 >= "1") {
	$link_sky3_stop=$_SERVER['PHP_SELF']."?action=sky3Stop";
	$sky3_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_sky3="<a href='$link_sky3_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($sky_3 == "0") {
	$link_sky3_start=$_SERVER['PHP_SELF']."?action=sky3Start";
	$sky3_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_sky3="<a href='$link_sky3_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}
if($sky_2 >= "1") {
	$link_sky2_stop=$_SERVER['PHP_SELF']."?action=sky2Stop";
	$sky2_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_sky2="<a href='$link_sky2_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($sky_2 == "0") {
	$link_sky2_start=$_SERVER['PHP_SELF']."?action=sky2Start";
	$sky2_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_sky2="<a href='$link_sky2_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($sky_1 >= "1") {
	$link_sky1_stop=$_SERVER['PHP_SELF']."?action=sky1Stop";
	$sky1_img="<img src='../img/online.gif' width='175' height='20' />";
	$but_sky1="<a href='$link_sky1_stop' ><img src='../img/stop.gif' width='175' height='20' border='0' /></a>";
}
if($sky_1 == "0") {
	$link_sky1_start=$_SERVER['PHP_SELF']."?action=sky1Start";
	$sky1_img="<img src='../img/offline.gif' width='175' height='20' />";
	$but_sky1="<a href='$link_sky1_start' ><img src='../img/start.gif' width='175' height='20' border='0' /></a>";
}

if($sky_1 >= "1") {
	$sky1_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($sky_1 == "0") {
	$sky1_img="<img src='../img/offline.gif' width='175' height='20' />";
}
if($sky_2 >= "1") {
	$sky2_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($sky_2 == "0") {
	$sky2_img="<img src='../img/offline.gif' width='175' height='20' />";
}
if($sky_3 >= "1") {
	$sky3_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($sky_3 == "0") {
	$sky3_img="<img src='../img/offline.gif' width='175' height='20' />";
}
if($sky_4 >= "1") {
	$sky4_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($sky_4 == "0") {
	$sky4_img="<img src='../img/offline.gif' width='175' height='20' />";
}
if($srg_ >= "1") {
	$srg_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($srg_ == "0") {
	$srg_img="<img src='../img/offline.gif' width='175' height='20' />";
}
if($tsat >= "1") {
	$tvsat_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($tsat == "0") {
	$tvsat_img="<img src='../img/offline.gif' width='175' height='20' />";
}
if($dcel >= "1") {
	$dcel_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($dcel == "0") {
	$dcel_img="<img src='../img/offline.gif' width='175' height='20' />";
}
if($priv >= "1") {
	$prisp_img="<img src='../img/online.gif' width='175' height='20' />";
}
if($priv == "0") {
	$prisp_img="<img src='../img/offline.gif' width='175' height='20' />";
}


$forceUpdate=exec("/usr/bin/cccam_cron");

$activeClient=exec("cat ". $cccam_info_dir . "activeclients.data | grep 'ACTIVE CLIENTS' | awk '{print $1}'");
$clients=exec("cat ". $cccam_info_dir . "clients.data | grep Connected | grep -v Host | awk '{print $3}'");
$server=exec("cat ". $cccam_info_dir . "servers.data | grep 'Server connections' | awk '{print $3}'");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel - <?php echo basename($_SERVER['REQUEST_URI']);?></title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
	color: #FFF;
}
a:visited {
	color: #FFF;
}
a:hover {
	color: #900;
}
a:active {
	color: #FFF;
}
body {
	background-color: #5B7CFF;
}
</style>
</head>

<body>
<?php include"top.inc.php";?><br />
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200" valign="top"><?php include"menu.inc.php";?></td>
    <td width="10">&nbsp;</td>
    <td valign="top"><table width="690" border="0" cellpadding="0" cellspacing="0" class="Contorno">
      <tr>
        <td valign="top" bgcolor="#84C1DF"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
        
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="TitoloMenu">
  <tr>
    <td bgcolor="#003366">Cam Control ::</td>
  </tr>
</table>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="TitoloMenu">
  <tr>
    <td bgcolor="#003366">&nbsp;</td>
  </tr>
</table>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto">Start MultiCs ::</td>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto"><a href="<?php echo $_SERVER['PHP_SELF']."?action=startCCcam";?>"><img src="../img/start.gif" width="175" height="20" border="0" /></a></td>
  </tr>
   <tr>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto">Stop MultiCs ::</td>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto"><a href="<?php echo $_SERVER['PHP_SELF']."?action=stopCCcam";?>"><img src="../img/stop.gif" width="175" height="20" border="0" /></a></td>
  </tr>

  <tr>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto">Restart MultiCs ::</td>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto"><a href="<?php echo $_SERVER['PHP_SELF']."?action=restartCCcam";?>"><img src="../img/restart.gif" width="175" height="20" border="0" /></a></td>
  </tr>
  <tr>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto">&nbsp;</td>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto">&nbsp;</td>
  </tr>
      <tr>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto">Restart (MultiCs, load new config) ::</td>
    <td height="20" bgcolor="#5B7CFF" class="TestoContenuto"><a href="<?php echo $_SERVER['PHP_SELF']."?action=restartCCcamCfg";?>"><img src="../img/restart.gif" alt="" width="175" height="20" border="0" /></a></td>
  </tr>
</table><br /></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<br /><?php include"bottom.inc.php";?>
</body>
</html>
