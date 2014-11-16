<?php
define("host", "localhost"); // your mysql host
define("username", "root"); // your mysql username
define("password", "1212"); // your mysql password
define("database", "multics"); // your database name
mysql_connect(host, username, password);
mysql_select_db(database);
unlink("/var/etc/cp.cfg");
file_put_contents("/var/etc/users.cfg", $pmgu, FILE_APPEND);
$pmgu = "\n#########################\n";
$pmgu .= "## " . date("Y-m-d H:i:s") . " ##\n";
$pmgu .= "##      MG-USER        ##\n";
$pmgu .= "#########################\n";
$pmgu .= "\n";
file_put_contents("/var/etc/cp.cfg", $pmgu, FILE_APPEND);
	
	$sql_pmgu = "SELECT * FROM cccam_pmgu WHERE pmgu_active = '1'";
	$query_pmgu = mysql_query($sql_pmgu);
	
	while($result_pmgu = mysql_fetch_assoc($query_pmgu)) {
	
	$stealth = $result_pmgu['pmgu_stealth'];
			 if($stealth == "0") {
				 $stealth = NULL;
			 }
	
	$pmgu_line = "CACHE PEER: " . $result_pmgu['pmgu_host'] . "\n";
	file_put_contents("/var/etc/cp.cfg", $pmgu_line, FILE_APPEND);
	}

echo '<center><h2>CACHE PEER UPDATED::</h2></center>'; 
        header("Refresh:4; URL=list_pmgline.php"); 
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