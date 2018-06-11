<?php
require_once 'db/config.php';
 

$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <?php include 'css/style.css'; ?>
</head>
<body>
	<div class="container-fluid my-container">
		<div class="row bg-primary my-container my-head">
			<div class="col-lg">
				<h1><?php echo 'MyCars'; ?></h1>
			</div>
			<div class="col-sm">
				<!--p class="text-right"><a href="logout.php" class="btn btn-danger">Sign Out</a></p-->
			</div>
		</div>
		<div class="row">
			<div class="col"></div>
    		<div class="col">
				<div class="wrapper">
			        <h2>Login</h2>
			        <p>Please fill in your credentials to login.</p>
			        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
			                <label>Username</label>
			                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
			                <span class="help-block"><?php echo $username_err; ?></span>
			            </div>    
			            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
			                <label>Password</label>
			                <input type="password" name="password" class="form-control">
			                <span class="help-block"><?php echo $password_err; ?></span>
			            </div>
			            <div class="form-group">
			                <input type="submit" class="btn btn-primary" value="Login">
			            </div>
			            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
			        </form>
			    </div>
			</div>
			<div class="col"></div>
		</div>
	</div>
	
        
</body>
</html>