<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
if(strcmp($_SESSION['uid'],"") == 0){
    //display and error message
    header("Location: signin.php");
}

require_once("includes/script_begin.inc");

?>

<TABLE class="table table-hover table-striped">
	<TR>
        <TH>Place</TH>
		<TH>Username</TH>
		<TH>Logs</TH>
        <TH>Hours</TH>
	</TR>
<?php
	$sql = "SELECT u.Username, SUM(Hours) Hours, COUNT(SLID) Count ";
	$sql .= "FROM ServiceLogs sl, Users u ";
	$sql .= "WHERE sl.CompanyID = $_SESSION[companyid] ";
    $sql .= "AND u.UserID = sl.UserID ";
    $sql .= "AND sl.Approved = 1 ";
    $sql .= "GROUP BY Username ";
    $sql .= "ORDER BY Hours DESC";
	//print("Grabbing ops: $sql <br /> ");
	$rs = mysql_query($sql);
	if($rs) $rsc = mysql_num_rows($rs);
	if($rsc > 0){
		for($i=0; $i < $rsc; $i++){
			$username = mysql_result($rs, $i, "Username");
			$count = mysql_result($rs, $i, "Count");
            $hours = mysql_result($rs, $i, "Hours");

            $place = $i + 1;
			if($place == 1) print("<tr class='info'>");
            else print("<TR>");
            print("<TD>$place</TD>");
			print("<TD><strong>$username</strong></TD>");
			print("<TD>$count</TD>");
			print("<TD>$hours</TD>");
            print("</tr>");
		}
	}
?>
	</TABLE>