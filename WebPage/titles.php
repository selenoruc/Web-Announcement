<?php
    $query = $db->query("SELECT title,id FROM announcement INNER JOIN user on (announcement.u_id= user.u_id) WHERE user.d_id='$number' OR user.d_id = '4' ", PDO::FETCH_ASSOC);
    
    if($query->rowCount()) 		/*Eğer eşleşme varsa.*/
    {
        $num = $query->rowCount();
        
        while( $num > 0) {
            $baslik = $query->fetch();
            echo $baslik["id"];
            echo " - ";
            echo $baslik["title"];
            echo "</br>";
            $num--;
        } 
    }
    else 	/*Eğer eşleşme yoksa*/
    {
        echo "Eşleşme hatalı ya da bulunamadı.";
    }
?>