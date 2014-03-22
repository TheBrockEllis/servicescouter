<HTML>
<HEAD>
	<TITLE>Sandbox</TITLE>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="../includes/bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
    <script type="text/javascript" src="sandbox.js"></script>
  
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="sandbox.css" />
</HEAD>
<BODY>
    
    <a href="#newop_div" role="button" class="btn" data-toggle="modal">Create New Opportunity</a>
    <br />
    
    <div id="optablediv">
        <?php include("optable.php"); ?>
    </div>

<!-- MODAL FORMS -->
    <div class="modal" tabindex="-1" role="dialog" id="newop_div">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">New Opportunity</h3>
        </div>
        <div class="modal-body">        
            <FORM name="theForm" id="theForm" method="POST" action="optable.php">
            <INPUT type="hidden" name="action" value="newop" />
            <TABLE>
                <TR>
                    <td>Title:</td>
                    <td><INPUT type="text" name="newop_title" size="36" /></td>
                </TR>
                <TR>
                    <td>Description:</td>
                    <td><INPUT type="text" name="newop_description" size="36" maxlength="128" /></td>
                </TR>
            </TABLE>
            
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary" id="newop_submit">Submit</button>
        </div>
        </FORM>
    </div>

</BODY>
</HTML>
