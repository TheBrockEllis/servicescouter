<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
if(strcmp($_SESSION['uid'],"") == 0){
    //display and error message
    header("Location: signin.php");
}

require_once("includes/script_begin.inc");

/***START PAGINATION CALCULATION***/
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $sql = "SELECT count(*) FROM ServiceOps WHERE Active = 1";
    $rs = mysql_query($sql);
    $rsc = mysql_num_rows($rs);
    $count = mysql_result($rs, 0, "count(*)");

    $rows_per_page = 5;
    $lastpage = ceil($count/$rows_per_page);

    $pageno = (int)$pageno;

    if ($pageno > $lastpage) {
        $pageno = $lastpage;
    }

    if ($pageno < 1) {
        $pageno = 1;
    }

    $limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
/***END PAGINATION CALCULATION***/

if(!empty($_POST) && isset($_POST)){
    
    $action = $_POST['action'];
    
    if($action == "newop"){
        
        $title = mysql_real_escape_string($_POST['newop_title']);
        $description = mysql_real_escape_string($_POST['newop_description']);
        
        $sql = "INSERT INTO ServiceOps (";
        $sql .= "CompanyID, AuthorID, Title, Description, DateTime";
        $sql .= ") VALUES (";
        $sql .= "1000, $_SESSION[uid], '$title', '$description', NOW()";
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

<?php if($_SESSION['companyid']) print(' <a href="#newop_div" role="button" class="btn" data-toggle="modal" style="float: left;"><i class="icon-plus-sign"></i> New Opportunity</a>'); ?>

<div class="pagination pagination-centered">
  <ul>
    <?php
    $prevpageno = $pageno - 1;
    $nextpageno = $pageno + 1;
    
    if($pageno == 1){
        print(" <li class='disabled'><a href=''>First</a></li> ");
        print(" <li class='disabled'><a href=''>Prev</a></li> ");
    }else{
        print(" <li><a href='activeopportunities.php?pageno=1'>First</a></li> ");
        print(" <li><a href='activeopportunities.php?pageno=$prevpageno'>Prev</a></li> ");        
    }
    
    print(" <li class='active'><a href='#'>$pageno / $lastpage </a></li> ");
    
    if ($pageno == $lastpage) {
        print(" <li class='active'><a href=''>NEXT</a></li> ");
        print(" <li class='active'><a href=''>LAST</a></li> ");
    }else{
        print(" <li><a href='home.php#tab2?pageno=$nextpageno'>Next</a></li> ");
        print(" <li><a href='#'>Last</a></li> ");    
    }
    ?>
  </ul>
</div>

<TABLE class="table">
	<TR>
		<TH>Opportunity</TH>
		<TH>Day</TH>
	</TR>
<?php
	$sql = "SELECT Title, Description, DateTime ";
	$sql .= "FROM ServiceOps so, Companies c ";
	$sql .= "WHERE c.LocationID = $_SESSION[companyid] ";
	$sql .= "AND c.CompanyID = so.CompanyID ";
    $sql .= "ORDER BY DateTime DESC ";
    $sql .= "$limit";
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