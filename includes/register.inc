<?php

function drop_locations() {
    $sql = "SELECT LocationID, City, State ";
    $sql .= "FROM Locations ";
    $sql .= "ORDER BY State";
    $rs = mysql_query($sql);
    error_log("Selecting Locations: $sql");
    if($rs) $rsc = mysql_num_rows($rs);
    if($rsc){
        print(" <SELECT name='location' style='width:150px;'> ");
        print(" <option value=''></option> ");
    
        for($i=0; $i < $rsc; $i++){
            $id = mysql_result($rs, $i, "LocationID");
            $city = mysql_result($rs, $i, "City");
            $state = mysql_result($rs, $i, "State");
            
            if($location == $id)
                print(" <option selected value=$id>$city, $state</option> \n");
            else
                print(" <option value=$id>$city, $state</option> ");
        }
        
        print("</SELECT>");
    }   
}


?>