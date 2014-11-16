<?php
define("host", "localhost"); // your mysql host
define("username", "root"); // your mysql username
define("password", "1212"); // your mysql password
define("database", "multics"); // your database name
mysql_connect(host, username, password);
mysql_select_db(database);
unlink("/var/etc/users.cfg");
file_put_contents("/var/etc/users.cfg", $mgu, FILE_APPEND);
$mgu = "\n#########################\n";
$mgu .= "## " . date("Y-m-d H:i:s") . " ##\n";
$mgu .= "##      MG-USER        ##\n";
$mgu .= "#########################\n";
$mgu .= "\n";
file_put_contents("/var/etc/users.cfg", $mgu, FILE_APPEND);
	
	$sql_mgu = "SELECT * FROM cccam_mgu WHERE mgu_active = '1'";
	$query_mgu = mysql_query($sql_mgu);
	
	while($result_mgu = mysql_fetch_assoc($query_mgu)) {
	
	$stealth = $result_mgu['mgu_stealth'];
			 if($stealth == "0") {
				 $stealth = NULL;
			 }
	
	$mgu_line = "MG: " . $result_mgu['mgu_username'] . " " . $result_mgu['mgu_password'] . " " . $result_mgu['mgu_profil'] . "\n";
	file_put_contents("/var/etc/users.cfg", $mgu_line, FILE_APPEND);
	}

echo '<center><h2>MG-USER UPDATED::</h2></center>'; 
        header("Refresh:4; URL=list_mgline.php"); 
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

  
</body>