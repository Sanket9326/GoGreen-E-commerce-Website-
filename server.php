
<!DOCTYPE html>
<html lang="en">

<head></head>
<body>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="loginModalLabel">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" placeholder="Enter email" id="email">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" placeholder="Enter password" id="pwd">
					</div>
					<div class="form-group form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Remember me
						</label>
					</div>
				</form>
			</div>
			
				
                
                        <div>
                            <button type="button" class="btn btn-primary">Login</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signupModal">
                                Sign Up
                            </button>
                        </div>
                    
                
                
                <!-- Signup Modal -->
                <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" placeholder="Enter email" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPwd">Confirm Password:</label>
                                        <input type="password" class="form-control" placeholder="Confirm password" id="confirmPwd" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
				
			</div>
		</div>
	</div>
</div>
<?php
// Retrieve email and password from form
$email = $_POST['email'];
$password = $_POST['password'];



  
// Other details
$name = $_POST['name'];
$phone = $_POST['phone'];

// Create connection to database
$servername = "local";
$username = "local";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert record into table
$sql = "INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters to statement
$stmt->bind_param("ssss", $name, $email, $password, $phone);

// Execute statement
if ($stmt->execute()) {
  echo "Record inserted successfully";
} else {
  echo "Error inserting record: " . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
</body>
</html>