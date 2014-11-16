<?php
define("host", "localhost"); // your mysql host
define("username", "root"); // your mysql username
define("password", "1212"); // your mysql password
define("database", "multics"); // your database name
mysql_connect(host, username, password);
mysql_select_db(database);
unlink("/var/etc/fline.cfg");
file_put_contents("/var/etc/fline.cfg", $fmgu, FILE_APPEND);
$fmgu = "\n#########################\n";
$fmgu .= "## " . date("Y-m-d H:i:s") . " ##\n";
$fmgu .= "##      FLINE        ##\n";
$fmgu .= "#########################\n";
$fmgu .= "\n";
file_put_contents("/var/etc/fline.cfg", $fmgu, FILE_APPEND);
	
	$sql_fmgu = "SELECT * FROM cccam_fmgu WHERE fmgu_active = '1'";
	$query_fmgu = mysql_query($sql_fmgu);
	
	while($result_fmgu = mysql_fetch_assoc($query_fmgu)) {
	
	$stealth = $result_fmgu['fmgu_stealth'];
			 if($stealth == "0") {
				 $stealth = NULL;
			 }
	
	$fmgu_line = "F: " . $result_fmgu['fmgu_host'] . "\n";
	file_put_contents("/var/etc/fline.cfg", $fmgu_line, FILE_APPEND);
	}

echo '<center><h2>FLINE UPDATED::</h2></center>'; 
        header("Refresh:4; URL=list_fmgline.php"); 
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