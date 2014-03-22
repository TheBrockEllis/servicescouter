<?php
require_once("../includes/script_begin.inc");

if(!empty($_POST) && isset($_POST)){
    
    $action = $_POST['action'];
    
    if($action == "newop"){
        
        $title = mysql_escape_string($_POST['newop_title']);
        $description = mysql_escape_string($_POST['newop_description']);
        
        $sql = "INSERT INTO ServiceOps (";
        $sql .= "CompanyID, AuthorID, Title, Description, DateTime";
        $sql .= ") VALUES (";
        $sql .= "1000, 1000, '$title', '$description', NOW()";
        $sql .= ")";
        //error_log("Adding Op: $sql");
        $rs = mysql_query($sql);
        if($rs){
            print(" <div class='alert alert-success'> ");
            print(" <button type='button' class='close' data-dismiss='alert'>x</button> ");
            print(" Service Op Added Successfully!</div> ");            
        }else{
            print(" <div class='alert alert-error'> ");
            print(" <button type='button' class='close' data-dismiss='alert'>x</button> ");
            print(" There was an error adding your service op!</div> ");  
        }
    }  
}

?>

<TABLE width=50% border=1 class="table">
	<TR>
		<TH>Opportunity</TH>
		<TH>Day</TH>
	</TR>
<?php
	$sql = "SELECT Title, Description, DateTime ";
	$sql .= "FROM ServiceOps so, Companies c ";
	$sql .= "WHERE c.LocationID = 1000 ";
	$sql .= "AND c.CompanyID = so.CompanyID ";
	//print("Grabbing ops: $sql ");
	$rs = mysql_query($sql);
	if($rs) $rsc = mysql_num_rows($rs);
	if($rsc > 0){
		for($i=0; $i < $rsc; $i++){
			$title = mysql_result($rs, $i, "Title");
			$description = mysql_result($rs, $i, "Description");
			$datetime = mysql_result($rs, $i, "DateTime");

			print("<TR>");
			print("<TD><strong>$title</strong><br />$description</TD>");
			print("<TD>$datetime</TD>");
			print("</TR>");
		}
	}
?>
	</TABLE>