<?php 
    $dbname = "quakestu_madico"; 
    $loginname = "quakestu_madico"; 
    $loginpass = "long9chaser"; 
    $dbhost = "localhost"; 
      
    echo('<html><body bgcolor="#FFFFFF">'); 
    echo('<font face="arial" size="+2"><center>'); 
    echo("Database $dbname"); 
      
    $id_link = @mysql_connect($dbhost, $loginname, $loginpass); 
      
    $tables = mysql_list_tables($dbname, $id_link); 
      
    $num_tables = mysql_num_rows($tables); 

    // store table names in an array 
    $arr_tablenames[] = ''; 
      
    // store number of fields per table(index 0,1,2..) in an array 
    $arr_num_fields[] = ''; 
    for ($i=0; $i < $num_tables; $i++) { 
        $arr_tablenames[$i] = mysql_tablename($tables, $i); 
        $arr_num_fields[$i] = mysql_num_fields(mysql_db_query($dbname, "select * from $arr_tablenames[$i]", $id_link)); 
    } 
      
    // store field names in a multidimensional array: 
    // [i] == table number, [ii] == field number for that table 
    for ($i=0; $i < $num_tables; $i++) { 
        for ($ii=0; $ii < $arr_num_fields[$i]; $ii++) { 
            $result = mysql_db_query($dbname, "select * from $arr_tablenames[$i]", $id_link); 
            $hash_field_names[$i][$ii] = mysql_field_name($result, $ii); 
        }      
    } 
      
    for ($i=0; $i < $num_tables; $i++) { 
        echo("<center><h3>Table $arr_tablenames[$i] </h3></center>"); 
        echo('<table align="center" border="1"><tr>'); 
        $result = mysql_db_query($dbname, "select * from $arr_tablenames[$i]", $id_link); 
        for ($ii=0; $ii < $arr_num_fields[$i]; $ii++) { 
            echo("<th>"); 
            echo $hash_field_names[$i][$ii]; 
            echo("</th>"); 
        } 
        echo("</tr><tr>"); 
        $number_of_rows = @mysql_num_rows($result); 
        for ($iii = 0; $iii < $number_of_rows; $iii++) { 
            $record = @mysql_fetch_row($result); 
            for ($ii=0; $ii < $arr_num_fields[$i]; $ii++) { 
                echo("<td>"); 
                echo $record[$ii]; 
                echo("</td>"); 
            } 
        echo("</tr>"); 
        } 
        echo("</table>"); 
    } 
      
    echo('</body></html>'); 
?>