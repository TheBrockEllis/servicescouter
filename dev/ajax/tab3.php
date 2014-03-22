<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
if(strcmp($_SESSION['uid'],"") == 0){
    //display and error message
    header("Location: signin.php");
}
require_once("../includes/opportunities.inc"); 
require_once("../includes/script_begin.inc");

?>

<TABLE class="table table-hover table-striped">
	<TR>
        <TH width=25%>Username</TH>
		<TH width=25%>Created</TH>
		<TH width=50%>Opportunity</TH>
        <TH width=10%>Hours</TH>
	</TR>
<?php
	$sql = "SELECT u.Username, Hours, OpID, sl.Created ";
	$sql .= "FROM ServiceLogs sl, Users u ";
	$sql .= "WHERE sl.CompanyID = $_SESSION[companyid] ";
    $sql .= "AND u.UserID = sl.UserID ";
    $sql .= "AND sl.Approved = 0 ";
    $sql .= "ORDER BY Created DESC";
	//print("Grabbing pending logs: $sql <br /> ");
	$rs = mysql_query($sql);
	if($rs) $rsc = mysql_num_rows($rs);
	if($rsc > 0){
		for($i=0; $i < $rsc; $i++){
			$username = mysql_result($rs, $i, "Username");
			$opid = mysql_result($rs, $i, "OpID");
                $title = getOpTitle($opid);
            $hours = mysql_result($rs, $i, "Hours");
            $created = mysql_result($rs, $i, "Created");

            $place = $i + 1;
			if($place == 1) print("<tr class='info'>");
            else print("<TR>");
            print("<TD><strong>$username</strong></TD>");
			print("<TD>$created</TD>");
			print("<TD>$title</TD>");
			print("<TD>$hours</TD>");
            print("</tr>");
		}
	}
?>
	</TABLE>