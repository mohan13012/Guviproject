<?php
session_start();


if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}


require_once 'db.php';
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT name, email, age, dob, contact FROM users WHERE id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $contact = $_POST['contact'];

  $stmt = $pdo->prepare("UPDATE users SET name = :name, age = :age, dob = :dob, contact = :contact WHERE id = :user_id");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':age', $age);
  $stmt->bindParam(':dob', $dob);
  $stmt->bindParam(':contact', $contact);
  $stmt->bindParam(':user_id', $user_id);
  $stmt->execute();

  
  $_SESSION['user_name'] = $name;


  header('Location: profile.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header text-center bg-info text-white">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">

                      
                        <form method="post" onsubmit="return validateForm();" action="update_profile.php">

                           
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="John Doe" required>
                            </div>

                          
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="johndoe@example.com" required>
                            </div>

                      
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="25" required>
                            </div>

                          
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="1998-01-01" required>
                            </div>

                       
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="1234567890" required>
                            </div>

                    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                            </div>

                        </form>
                       

                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
