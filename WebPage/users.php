<?php
    
    $query = $db->query("SELECT name,mail FROM user WHERE d_id='$number' ", PDO::FETCH_ASSOC);
    
    if($query->rowCount()) 		/*Eğer eşleşme varsa.*/
    {
        $num = $query->rowCount();
        
        while( $num > 0) {
            $row = $query->fetch();
            echo "</br>";
            echo $row["name"];
            echo " - ";
            echo $row["mail"];
            $num--;
        }
    }
    else 	/*Eğer eşleşme yoksa*/
    {
        echo "Eşleşme hatalı ya da bulunamadı.";
    }
?>