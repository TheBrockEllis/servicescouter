<?php

class OpObj {
    var $opid;
    var $companyid;
    var $authorid;
    var $active;
    var $title;
    var $description;
    var $datetime;

    function OpObj($opid) {
        $this->opid = $opid;

        if(!empty($opid)) {
            $this->GetData();
        }
    }

    function GetData() {
        $sql  = "SELECT CompanyID, AuthorID, Active, Title, Description, DateTime ";
        $sql .= "FROM ServiceOps ";
        $sql .= "WHERE OpID = $this->opid";
        //print("SQL: $sql");
        $rs = mysql_query( $sql);
        if($rs) $rsc = mysql_num_rows($rs);
        if($rsc > 0) {
            $this->opid = $this->opid;
            $this->companyid = mysql_result($rs, 0, "CompanyID");
            $this->authorid = mysql_result($rs, 0, "AuthorID");
            $this->active = mysql_result($rs, 0, "Active");
            $this->title = mysql_result($rs, 0, "Title");
            $this->description = mysql_result($rs, 0, "Description");
            $this->datetime = mysql_result($rs, 0, "DateTime");
        }
    } //end GetData function
    
    function Insert() {

        $sql  = "INSERT INTO ServiceOps ( ";
        $sql .= "CompanyID, AuthorID, Active, Title, Description, DateTime";
        $sql .= ")VALUES(";
        $sql .= "$this->companyid, $this->authorid, $this->active, '$this->title', '$this->description', '$this->datetime'";
        $sql .= ") ";
        //error_log("SQL: $sql<BR>");
        mysql_query( $sql);
        $this->opid = mysql_insert_id();
    }
    
    function Update() {

        $sql  = "UPDATE ServiceOps SET  ";
        $sql .= "CompanyID = $this->companyid, ";
        $sql .= "AuthorID = '$this->authorid', ";
        $sql .= "Active = '$this->active', ";
        $sql .= "Title = '$this->title', ";
        $sql .= "Description = '$this->description', ";
        $sql .= "DateTime = '$this->datetime' ";
        $sql .= "WHERE OpID = $this->opid ";
        //print("SQL: $sql<BR>");
        mysql_query( $sql);
    }
        
} //end class

    function getOpTitle($opid){
        $sql = "SELECT Title FROM ServiceOps WHERE OpID = $opid";
        $rs = mysql_query($sql);
        if($rs) $rsc = mysql_num_rows($rs);
        if($rsc) $title = mysql_result($rs, 0, "Title");
        return($title);
    }

?>