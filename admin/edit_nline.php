<?php 
session_start();
include"../config.inc.php";
include"../function.inc.php";
verifyAuth();

// Call logout function
if(isset($_GET['action']) && $_GET['action'] == "logout") {
logout();	
}

// List Menu UpHops

$nmgu_id = $_GET['nmgu_id'];

$sql_stealth = "SELECT * FROM cccam_stealth";
$query_stealth = mysql_query($sql_stealth);

$sql_nmgu = "SELECT * FROM cccam_nmgu WHERE nmgu_id = '$nmgu_id'";
$query_nmgu = mysql_query($sql_nmgu);
$result_nmgu = mysql_fetch_assoc($query_nmgu);


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
              <td bgcolor="#003366">Edit Nline ::</td>
              </tr>
        </table>
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="TitoloMenu">
            <tr>
              <td bgcolor="#003366">&nbsp;</td>
              </tr>
          </table>
          <form id="form" NAME="form" method="post" onSubmit="return nameempty();" action="insert_confirm.php">
            <table width="650" border="0" align="center" cellpadding="0" cellspacing="1">
             <td bgcolor="#5B7CFF" class="TestoContenuto">Host ::</td>
                <td bgcolor="#5B7CFF"><input name="nmgu_hops" type="text" class="LoginBox" id="textfield3" value="<?php echo $result_nmgu['nmgu_hops'];?>" /></td>
              </tr>
              <tr>
                <td width="200" bgcolor="#5B7CFF" class="TestoContenuto">Port ::</td>
                 <td bgcolor="#5B7CFF"><label for="user_name"></label>
                  <input name="nmgu_port" type="text" class="LoginBox" id="textfield2" value="<?php echo $result_nmgu['nmgu_port'];?>" /></td>
              </tr>

             <tr>
                <td bgcolor="#5B7CFF" class="TestoContenuto">Username ::</td>
                <td bgcolor="#5B7CFF"><input name="nmgu_username" type="text" class="LoginBox" id="textfield3" value="<?php echo $result_nmgu['nmgu_username'];?>" /></td>
              </tr>
              <tr>
                <td bgcolor="#5B7CFF" class="TestoContenuto">Password ::</td>
                <td bgcolor="#5B7CFF"><input name="nmgu_password" type="text" class="LoginBox" id="textfield4" value="<?php echo $result_nmgu['nmgu_password'];?>" /></td>
              </tr>
               <tr>
                <td width="200" bgcolor="#5B7CFF" class="TestoContenuto">DesKey ::</td>
                <td bgcolor="#5B7CFF"><label for="user_name"></label>
               <input name="nmgu_des" type="text" class="LoginBox" id="textfield2" value="<?php echo $result_nmgu['nmgu_des'];?>" /></td>
              </tr>
              <tr>
                <td bgcolor="#5B7CFF" class="TestoContenuto">&nbsp;</td>
                <td bgcolor="#5B7CFF"><input name="nmgu_id" type="hidden" id="nmgu_id" value="<?php echo $_GET['nmgu_id'];?>" />
                  <input name="edit_nmgu" type="hidden" id="edit_nmgu" value="ok" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="button2" type="submit" class="LoginBox" id="button2" value="Update" /></td>
              </tr>
          </table>
          </form>
          <br /></td>
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
<?php mysql_close($query);?>