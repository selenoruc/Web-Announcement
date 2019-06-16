<?php
    
// Define variables and initialize with empty values
$title = "";
$user_id = $_SESSION['user_id'];
$title_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_error = "Boş bırakılamaz.";
    }  else{
        $title = $input_title;
    }
    
    // Check input errors before inserting in database
    if(empty($title_error)){
        // Prepare an insert statement
        $sql = $db->query("INSERT INTO announcement (title, u_id) VALUES (:title, :user_id)", PDO::FETCH_ASSOC);
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":title", $param_title);
            $stmt->bindParam(":user_id", $param_user_id);
            
            // Set parameters
            $param_title = $title;
            $param_user_id = $user_id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: admin.php");
                exit();
            } else{
                echo "Hata oluştu.Lütfen daha sonra tekrar deneyin.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Duyuru Ekle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Duyuru Ekle</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($title_error)) ? 'has-error' : ''; ?>">
                            <label>Başlık</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                            <span class="help-block"><?php echo $title_error;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin.php" class="btn btn-default">İptal</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
