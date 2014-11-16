<?php
define("host", "localhost"); // your mysql host
define("username", "root"); // your mysql username
define("password", "1212"); // your mysql password
define("database", "multics"); // your database name
mysql_connect(host, username, password);
mysql_select_db(database);
unlink("/var/etc/nline.cfg");
file_put_contents("/var/etc/nline.cfg", $nmgu, FILE_APPEND);
$nmgu = "\n#########################\n";
$nmgu .= "## " . date("Y-m-d H:i:s") . " ##\n";
$nmgu .= "##      NLINE       ##\n";
$nmgu .= "#########################\n";
$nmgu .= "\n";
file_put_contents("/var/etc/nline.cfg", $nmgu, FILE_APPEND);
	
	$sql_nmgu = "SELECT * FROM cccam_nmgu WHERE nmgu_active = '1'";
	$query_nmgu = mysql_query($sql_nmgu);
	
	while($result_nmgu = mysql_fetch_assoc($query_nmgu)) {
	
	$stealth = $result_nmgu['nmgu_stealth'];
			 if($stealth == "0") {
				 $stealth = NULL;
			 }
	$nmgu_line = "N: " . $result_nmgu['nmgu_hops'] . " ". $result_nmgu['nmgu_port']." " . $result_nmgu['nmgu_username'] . " " . $result_nmgu['nmgu_password'] . " ". $result_nmgu['nmgu_des'] . "\n";
	file_put_contents("/var/etc/nline.cfg", $nmgu_line, FILE_APPEND);
	}

echo '<center><h2>NLINE UPDATED::</h2></center>'; 
        header("Refresh:4; URL=list_nline.php"); 
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