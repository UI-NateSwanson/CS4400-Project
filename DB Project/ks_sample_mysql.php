<?php
 echo("<html><head><title>Sample PHP Script</title></head>\n");

 //  hostname, username, password
 $dbcnx = mysql_connect("dbdev.cs.uiowa.edu:3306","db_ksompallae","+yX-DEV.Gz-_");
 if (!$dbcnx) {
   echo( "<P>Unable to connect to the " .
         "database server at this time.</P>\n" );
   exit();
 }
 mysql_select_db("WorksOn",$dbcnx);
 if (! @mysql_select_db("WorksOn") ) {
   echo( "<P>Unable to locate the sample " .
         "database at this time.</P>" );
   exit();
 }
 # do a simple query and print it out
 $sql_query="SELECT car_id, car_type, car_model FROM Cars";

 $result_set = mysql_query($sql_query);
 if (!$result_set) {
   echo("<P>Error performing query: " .
        mysql_error() . "</P>");
   exit();
 }

 echo("<h2>" . $sql_query . "</h2>");
 echo("<table><tr><th>car_id</th><th>car_type</th><th>car_model</th></tr>\n");
 while ( $row = mysql_fetch_array($result_set) ) {
   echo("<tr><td>" . $row["car_id"] . "</td>\n" .
        "     <td>" . $row["car_type"] . "</td>\n" .
        "     <td>" . $row["car_model"] . "</td>\n" .
        "</tr>\n");
 }
 echo ("</table>\n");
 echo ("</body></html>");
 ?>
