<?php
    require_once ("config.php");
    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    
    echo "Hoşgeldin, "; 
    $user_id = $_SESSION['user_id'];
    echo $_SESSION['user_name'];
    include("html/adminPanel.html");

    // Attempt select query execution
    if($user_id=='5'){//ADMIN USER ID=5
        $result = $db->query("SELECT * FROM announcement", PDO::FETCH_ASSOC);
    }
    else{
        $result = $db->query("SELECT * FROM announcement where u_id = $user_id", PDO::FETCH_ASSOC);
    }
    
    if($result){
        if($result->rowCount() > 0){
            echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Başlık</th>";
                        #echo "<th>Kullanıcı ID</th>";
                        #echo "<th>Tarih</th>";
                        echo "<th>Eylemler</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch()){
                    echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        #echo "<td>" . $row['u_id'] . "</td>";
                        #echo "<td>" . $row['date'] . "</td>";
                        echo "<td>";
                            echo "<a href='read.php?id=". $row['id'] ."' title='Görüntüle' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='update.php?id=". $row['id'] ."' title='Düzenle' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='delete.php?id=". $row['id'] ."' title='Sil' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                        echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";                            
            echo "</table>";
            // Free result set
            unset($result);
        } else{
            echo "<p class='lead'><em>Kayıt bulunamadı.</em></p>";
        }
    } else{
        echo "HATA: Execute işlemine uygun değil $sql. " . $mysqli->error;
    }
    
    // Bağlantıyı sonlandır.
   # unset($pdo);

?>