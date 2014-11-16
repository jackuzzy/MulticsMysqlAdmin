<?php
define("host", "localhost"); // your mysql host
define("username", "root"); // your mysql username
define("password", "1212"); // your mysql password
define("database", "multics"); // your database name
mysql_connect(host, username, password);
mysql_select_db(database);
unlink("/var/etc/cline.cfg");
file_put_contents("/var/etc/cline.cfg", $cmgu, FILE_APPEND);
$cmgu = "\n#########################\n";
$cmgu .= "## " . date("Y-m-d H:i:s") . " ##\n";
$cmgu .= "##      CLINE        ##\n";
$cmgu .= "#########################\n";
$cmgu .= "\n";
file_put_contents("/var/etc/cline.cfg", $cmgu, FILE_APPEND);
	
	$sql_cmgu = "SELECT * FROM cccam_cmgu WHERE cmgu_active = '1'";
	$query_cmgu = mysql_query($sql_cmgu);
	
	while($result_cmgu = mysql_fetch_assoc($query_cmgu)) {
	
	$stealth = $result_cmgu['cmgu_stealth'];
			 if($stealth == "0") {
				 $stealth = NULL;
			 }
	
	$cmgu_line = "C: " . $result_cmgu['cmgu_host'] . "\n";
	file_put_contents("/var/etc/cline.cfg", $cmgu_line, FILE_APPEND);
	}

echo '<center><h2>CLINE UPDATED::</h2></center>'; 
        header("Refresh:4; URL=list_cmgline.php"); 
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