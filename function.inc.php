<?php
function verifyAuth() {
	if(isset($_SESSION['username']))
{
}
else
{
  // Not logged in
  header("Location: ../index.php?action=notloggedin");
  exit();
}
}

function logout () {
session_destroy();
header("Location: ../index.php?action=logout");
exit();
}

function datediff($tipo, $partenza, $fine)
    {
        switch ($tipo)
        {
            case "A" : $tipo = 365;
            break;
            case "M" : $tipo = (365 / 12);
            break;
            case "S" : $tipo = (365 / 52);
            break;
            case "G" : $tipo = 1;
            break;
        }
        $arr_partenza = explode("-", $partenza);
        $partenza_gg = $arr_partenza[0];
        $partenza_mm = $arr_partenza[1];
        $partenza_aa = $arr_partenza[2];
        $arr_fine = explode("-", $fine);
        $fine_gg = $arr_fine[0];
        $fine_mm = $arr_fine[1];
        $fine_aa = $arr_fine[2];
        $date_diff = mktime(12, 0, 0, $fine_mm, $fine_gg, $fine_aa) - mktime(12, 0, 0, $partenza_mm, $partenza_gg, $partenza_aa);
        $date_diff  = floor(($date_diff / 60 / 60 / 24) / $tipo);
        return $date_diff;
    }
	
function GetServerStatus($site, $port)
{
	$status = array("OFFLINE", "ONLINE");
$fp = @fsockopen($site, $port, $errno, $errstr, 2);
if (!$fp) {
    return $status[0];
	} else { 
	return $status[1];
	}
	}
	
function cccam_cfg() {
	$date = "###################<br>";
	$date .= "## " . date("Y-m-d H:i:s") . " ##<br>";
	$date .= "###################<br><br>";
	file_put_contents("multics.cfg", $date, FILE_APPEND);
	
	
	$fline = "#########<br>";
	$fline .= "## F-Line ##<br>";
	$fline .= "#########<br><br>";
	file_put_contents("multics.cfg", $fline, FILE_APPEND);
	
	$sql_fline = "SELECT * FROM cccam_fline WHERE fline_active = '1'";
	$query_fline = mysql_query($sql_fline);
	
	while($result_fline = mysql_fetch_assoc($query_fline)) {
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] == NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . "";
					$chanlimit = NULL;
					$timelimit = NULL;
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] != NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] == NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . ", " . $result_fline['fline_cardlimit'] . "";
					$chanlimit = NULL;
					$timelimit = NULL;
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] != NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] == NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . ", " . $result_fline['fline_cardlimit'] . "";
					$chanlimit = "  " . $result_fline['fline_chanlimit'] . "";
					$timelimit = NULL;
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] != NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . ", " . $result_fline['fline_cardlimit'] . "";
					$chanlimit = "  " . $result_fline['fline_chanlimit'] . "";
					$timelimit = "  " . $result_fline['fline_timelimit'] . "";
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] != NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . ", " . $result_fline['fline_cardlimit'] . "";
					$chanlimit = "  " . $result_fline['fline_chanlimit'] . "";
					$timelimit = "  " . $result_fline['fline_timelimit'] . "";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . "";
					$chanlimit = "  " . $result_fline['fline_chanlimit'] . "";
					$timelimit = "  " . $result_fline['fline_timelimit'] . "";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . "";
					$chanlimit = " ";
					$timelimit = "  " . $result_fline['fline_timelimit'] . "";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] == NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . "";
					$chanlimit = " ";
					$timelimit = " ";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
					if($result_fline['fline_cardlimit'] != NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] == NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . ", " . $result_fline['fline_cardlimit'] . "";
					$chanlimit = " ";
					$timelimit = " ";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] == NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . " ";
					$chanlimit = " " . $result_fline['fline_chanlimit'] . " ";
					$timelimit = NULL;
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . " ";
					$chanlimit = " " . $result_fline['fline_chanlimit'] . " ";
					$timelimit = "  " . $result_fline['fline_timelimit'] . " ";
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . " ";
					$chanlimit = " " . $result_fline['fline_chanlimit'] . " ";
					$timelimit = "  " . $result_fline['fline_timelimit'] . " ";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] != NULL && 
					   $result_fline['fline_timelimit'] == NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . " ";
					$chanlimit = " " . $result_fline['fline_chanlimit'] . " ";
					$timelimit = " ";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
					if($result_fline['fline_cardlimit'] == NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . " ";
					$chanlimit = " ";
					$timelimit = "  " . $result_fline['fline_timelimit'] . " ";
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] != NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] == NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . ", " . $result_fline['fline_cardlimit'] . "";
					$chanlimit = " ";
					$timelimit = "  " . $result_fline['fline_timelimit'] . " ";
					$hostlimit = NULL;
					   }
					if($result_fline['fline_cardlimit'] != NULL && 
					   $result_fline['fline_chanlimit'] == NULL && 
					   $result_fline['fline_timelimit'] != NULL && 
					   $result_fline['fline_hostlimit'] != NULL) {
					$reshare = "  " . $result_fline['fline_reshare'] . ", " . $result_fline['fline_cardlimit'] . "";
					$chanlimit = " ";
					$timelimit = "  " . $result_fline['fline_timelimit'] . " ";
					$hostlimit = " " . $result_fline['fline_hostlimit'];
					   }
		$fline_line = "F: ".$result_fline['fline_username']." ".$result_fline['fline_password']." ".$result_fline['fline_uphops']." ".$result_fline['fline_shareemus']." ".$result_fline['fline_allowemm'] ." " . $reshare . $chanlimit . $timelimit . $hostlimit . "<br>";
	file_put_contents("multics.cfg", $fline_line, FILE_APPEND);
	}
	
	$cline = "<br>#########<br>";
	$cline .= "## C-Line ##<br>";
	$cline .= "#########<br><br>";
	file_put_contents("multics.cfg", $cline, FILE_APPEND); 
	
	$sql_cline = "SELECT * FROM cccam_cline WHERE cline_active = '1' ";
	$query_cline = mysql_query($sql_cline);
	
	while($result_cline = mysql_fetch_assoc($query_cline)) {
		
		$hops_val = $result_cline['cline_caid_id_hops'];
			 $wemu_val = $result_cline['cline_wantemus'];
			 $limit_val = $result_cline['cline_cardlimit'];
			 if($wemu_val == "yes") {
				 $wemu = "yes";
				 $hops = NULL;
				 
			 }
			 if($wemu_val == "no") {
				 $wemu = "no";
				 $hops = " { " . $hops_val . " }";
				
			 }
			if($wemu_val == "no" && $limit_val != NULL) {
				 $wemu = "no";
				 $hops = "  " . $hops_val.", " . $limit_val . " ";
				 
			 }
		
	$cline_line = "C: " . $result_cline['cline_hostname'] . " " . $result_cline['cline_port'] . " " . $result_cline['cline_username'] . " " . $result_cline['cline_password'] . " " . $hops . "<br>";
	file_put_contents("multics.cfg", $cline_line, FILE_APPEND);
	}
	
	$nline = "<br>#########<br>";
	$nline .= "## N-Line ##<br>";
	$nline .= "#########<br><br>";
	file_put_contents("multics.cfg", $nline, FILE_APPEND);
	
	$sql_nline = "SELECT * FROM cccam_nline WHERE nline_active = '1'";
	$query_nline = mysql_query($sql_nline);
	
	while($result_nline = mysql_fetch_assoc($query_nline)) {
	
	$stealth = $result_nline['nline_stealth'];
			 if($stealth == "0") {
				 $stealth = NULL;
			 }
	
	$nline_line = "N: " . $result_nline['nline_hostname'] . " " . $result_nline['nline_port'] . " " . $result_nline['nline_username'] . " " . $result_nline['nline_password'] . " " . $result_nline['nline_des'] . "<br>";
	file_put_contents("multics.cfg", $nline_line, FILE_APPEND);
	}
	
       $profil = "<br>#########<br>";
	$profil .= "## Profil ##<br>";
	$profil .= "#########<br><br>";
	file_put_contents("multics.cfg", $profil, FILE_APPEND);
	
	$sql_profil = "SELECT * FROM cccam_profil WHERE profil_active = '1'";
	$query_profil = mysql_query($sql_profil);
	
	while($result_profil = mysql_fetch_assoc($query_profil)) {
	
	$profil_line = $result_profil['profil_value_name'] . " " . $result_profil['profil_value'] . "<br>";
	file_put_contents("multics.cfg", $profil_line, FILE_APPEND);
	}
	
	$profil = file_get_contents("multics.cfg");
	echo "<span class=\"CCcamTMP\">" . $profil . "</span>";
	exec("rm multics.cfg");	
	
		
	$config = "<br>#########<br>";
	$config .= "## Config ##<br>";
	$config .= "#########<br><br>";
	file_put_contents("multics.cfg", $config, FILE_APPEND);
	
	$sql_config = "SELECT * FROM cccam_config WHERE config_active = '1'";
	$query_config = mysql_query($sql_config);
	
	while($result_config = mysql_fetch_assoc($query_config)) {
	
	$config_line = $result_config['config_value_name'] . " " . $result_config['config_value'] . "<br>";
	file_put_contents("multics.cfg", $config_line, FILE_APPEND);
	}
	
	$cccam = file_get_contents("multics.cfg");
	echo "<span class=\"CCcamTMP\">" . $cccam . "</span>";
	exec("rm multics.cfg");	
	
	
	
}

function oscamSrvid() {
	$os_srvid = "###################<br>";
	$os_srvid .= "## " . date("Y-m-d H:i:s") . " ##<br>";
	$os_srvid .= "###################<br><br>";
	file_put_contents("oscam.srvid", $os_srvid, FILE_APPEND);
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$cin = "# Cinema <br><br>";
	file_put_contents("oscam.srvid", $cin , FILE_APPEND);
	
	$sql_sky = "SELECT * FROM cccam_channelinfo WHERE chan_provider = 'Sky Italia' AND chan_category = 'Cinema'";
	$query_sky = mysql_query($sql_sky);
	
	
	while($result_sky = mysql_fetch_assoc($query_sky)) {
	
	$chan_caid = $result_sky['chan_caid'];
	$chan_chaid = $result_sky['chan_chaid'];
	$chan_provider = $result_sky['chan_provider'];
	$chan_channel_name = $result_sky['chan_channel_name'];
	
	$os_srvid_line = $chan_caid . "|" . $chan_chaid . "|" . $chan_provider . "|" . $chan_channel_name . "|" . "TV" . "<br>";
	file_put_contents("oscam.srvid", $os_srvid_line, FILE_APPEND);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$intr = "<br># Intrattenimento <br><br>";
	file_put_contents("oscam.srvid", $intr , FILE_APPEND);
	
	$sql_sky = "SELECT * FROM cccam_channelinfo WHERE chan_provider = 'Sky Italia' AND chan_category = 'Intrattenimento'";
	$query_sky = mysql_query($sql_sky);
	
	
	while($result_sky = mysql_fetch_assoc($query_sky)) {
	
	$chan_caid = $result_sky['chan_caid'];
	$chan_chaid = $result_sky['chan_chaid'];
	$chan_provider = $result_sky['chan_provider'];
	$chan_channel_name = $result_sky['chan_channel_name'];
	
	$os_srvid_line = $chan_caid . "|" . $chan_chaid . "|" . $chan_provider . "|" . $chan_channel_name . "|" . "TV" . "<br>";
	file_put_contents("oscam.srvid", $os_srvid_line, FILE_APPEND);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$sport = "<br># Sport <br><br>";
	file_put_contents("oscam.srvid", $sport , FILE_APPEND);
	
	$sql_sky = "SELECT * FROM cccam_channelinfo WHERE chan_provider = 'Sky Italia' AND chan_category = 'Sport'";
	$query_sky = mysql_query($sql_sky);
	
	
	while($result_sky = mysql_fetch_assoc($query_sky)) {
	
	$chan_caid = $result_sky['chan_caid'];
	$chan_chaid = $result_sky['chan_chaid'];
	$chan_provider = $result_sky['chan_provider'];
	$chan_channel_name = $result_sky['chan_channel_name'];
	
	$os_srvid_line = $chan_caid . "|" . $chan_chaid . "|" . $chan_provider . "|" . $chan_channel_name . "|" . "TV" . "<br>";
	file_put_contents("oscam.srvid", $os_srvid_line, FILE_APPEND);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$cultura = "<br># Cultura <br><br>";
	file_put_contents("oscam.srvid", $cultura , FILE_APPEND);
	
	$sql_sky = "SELECT * FROM cccam_channelinfo WHERE chan_provider = 'Sky Italia' AND chan_category = 'Cultura'";
	$query_sky = mysql_query($sql_sky);
	
	
	while($result_sky = mysql_fetch_assoc($query_sky)) {
	
	$chan_caid = $result_sky['chan_caid'];
	$chan_chaid = $result_sky['chan_chaid'];
	$chan_provider = $result_sky['chan_provider'];
	$chan_channel_name = $result_sky['chan_channel_name'];
	
	$os_srvid_line = $chan_caid . "|" . $chan_chaid . "|" . $chan_provider . "|" . $chan_channel_name . "|" . "TV" . "<br>";
	file_put_contents("oscam.srvid", $os_srvid_line, FILE_APPEND);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$bambini = "<br># Bambini <br><br>";
	file_put_contents("oscam.srvid", $bambini , FILE_APPEND);
	
	$sql_sky = "SELECT * FROM cccam_channelinfo WHERE chan_provider = 'Sky Italia' AND chan_category = 'Bambini'";
	$query_sky = mysql_query($sql_sky);
	
	
	while($result_sky = mysql_fetch_assoc($query_sky)) {
	
	$chan_caid = $result_sky['chan_caid'];
	$chan_chaid = $result_sky['chan_chaid'];
	$chan_provider = $result_sky['chan_provider'];
	$chan_channel_name = $result_sky['chan_channel_name'];
	
	$os_srvid_line = $chan_caid . "|" . $chan_chaid . "|" . $chan_provider . "|" . $chan_channel_name . "|" . "TV" . "<br>";
	file_put_contents("oscam.srvid", $os_srvid_line, FILE_APPEND);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$notizie = "<br># Notizie <br><br>";
	file_put_contents("oscam.srvid", $notizie , FILE_APPEND);
	
	$sql_sky = "SELECT * FROM cccam_channelinfo WHERE chan_provider = 'Sky Italia' AND chan_category = 'Notizie'";
	$query_sky = mysql_query($sql_sky);
	
	
	while($result_sky = mysql_fetch_assoc($query_sky)) {
	
	$chan_caid = $result_sky['chan_caid'];
	$chan_chaid = $result_sky['chan_chaid'];
	$chan_provider = $result_sky['chan_provider'];
	$chan_channel_name = $result_sky['chan_channel_name'];
	
	$os_srvid_line = $chan_caid . "|" . $chan_chaid . "|" . $chan_provider . "|" . $chan_channel_name . "|" . "TV" . "<br>";
	file_put_contents("oscam.srvid", $os_srvid_line, FILE_APPEND);
	}
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$altri = "<br># Altri <br><br>";
	file_put_contents("oscam.srvid", $altri , FILE_APPEND);
	
	$sql_sky = "SELECT * FROM cccam_channelinfo WHERE chan_provider = 'Sky Italia' AND chan_category = 'Altri'";
	$query_sky = mysql_query($sql_sky);
	
	
	while($result_sky = mysql_fetch_assoc($query_sky)) {
	
	$chan_caid = $result_sky['chan_caid'];
	$chan_chaid = $result_sky['chan_chaid'];
	$chan_provider = $result_sky['chan_provider'];
	$chan_channel_name = $result_sky['chan_channel_name'];
	
	$os_srvid_line = $chan_caid . "|" . $chan_chaid . "|" . $chan_provider . "|" . $chan_channel_name . "|" . "TV" . "<br>";
	file_put_contents("oscam.srvid", $os_srvid_line, FILE_APPEND);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$oscam_srvid = file_get_contents("oscam.srvid");
	echo $oscam_srvid;
	exec("rm oscam.srvid");
}

?>