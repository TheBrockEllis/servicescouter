<?php

class UserObj {
    var $userid;
    var $locationid;
    var $companyid;
    var $username;
    var $password;
    var $email;
    var $firstname;
    var $lastname;
    var $picture;
    var $active;

    function UserObj($userid) {
        $this->userid = $userid;

        if(!empty($userid)) {
            $this->GetData();
        }
    }

    function GetData() {
        $sql  = "SELECT LocationID, CompanyID, Username, Password, FirstName, LastName  ";
        $sql .= "Email, Active, Picture ";
        $sql .= "FROM Users ";
        $sql .= "WHERE UserID = $this->userid";
        //print("SQL: $sql");
        $rs = mysql_query( $sql);
        if($rs) $rsc = mysql_num_rows($rs);
        if($rsc > 0) {
            $this->userid = $this->userid;
            $this->locationid = mysql_result($rs, 0, "LocationID");
            $this->firstname = mysql_result($rs, 0, "FirstName");
            $this->lastname = mysql_result($rs, 0, "LastName");
            $this->username = mysql_result($rs, 0, "UserName");
            $this->password = mysql_result($rs, 0, "Password");
            $this->companyid = mysql_result($rs, 0, "CompanyID");
            $this->email = mysql_result($rs, 0, "Email");
            $this->active = mysql_result($rs, 0, "Active");
            $this->picture = mysql_result($rs, 0, "Picture");
        }
    } //end GetData function
    
    function Insert() {

        if(empty($this->companyid)) $this->companyid = 0;

        $sql  = "INSERT INTO Users ( ";
        $sql .= "LocationID, CompanyID, FirstName, LastName, Username, Password, ";
        $sql .= "Email";
        $sql .= ")VALUES(";
        $sql .= "$this->locationid, $this->companyid, '$this->firstname', '$this->lastname', '$this->username', $this->password,  ";
        $sql .= "'$this->email' ";
        $sql .= ") ";
        //error_log("SQL: $sql<BR>");
        mysql_query( $sql);
        $this->userid = mysql_insert_id();
    }
    
    function Update() {

        if(empty($this->companyid)) $this->companyid = 0;

        $sql  = "UPDATE Users SET  ";
        $sql .= "LocationID = $this->locationid, ";
        $sql .= "CompanyID = $this->companyid, ";
        $sql .= "FirstName = '$this->firstname', ";
        $sql .= "LastName = '$this->lastname', ";
        $sql .= "Username = '$this->username', ";
        $sql .= "Password = '$this->password', ";
        $sql .= "Email = '$this->email' ";
        $sql .= "WHERE UserID = $this->userid ";
        //print("SQL: $sql<BR>");
        mysql_query( $sql);
    }
} //end class
?>