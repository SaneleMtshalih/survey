<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>survey submitted</title>

 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  
</body>
</html>
<?php
// Establish a connection to the database
$servername = 'localhost';
$username = 'root';
$password = '' ;
$dbname = 'survey';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $email = $conn->real_escape_string($_POST['email']);
    $dateOfBirth = $conn->real_escape_string($_POST['date']);
    $contactNumber = $conn->real_escape_string($_POST['number']);
    // Handle favorite foods as an array
    if(isset($_POST['favoriteFoods']) && is_array($_POST['favoriteFoods'])) {
        $favoriteFoods = implode(", ", $_POST['favoriteFoods']); // Convert array to string
    } else {
        $favoriteFoods = ""; // Set to empty string if no foods selected
    }
    
// Map the rating strings to numerical values
function mapRatingToInt($rating) {
    switch ($rating) {
        case "strongly_agree":
            return 5;
        case "agree":
            return 4;
        case "neutral":
            return 3;
        case "disagree":
            return 2;
        case "strongly_disagree":
            return 1;
        default:
            return 0; // Handle unexpected cases gracefully
    }
}

// Extract ratings for each question and convert to numerical values
$movies = mapRatingToInt($_POST['movies']);
$radio = mapRatingToInt($_POST['radio']);
$eatOut = mapRatingToInt($_POST['eat_out']);
$watchTv = mapRatingToInt($_POST['watch_tv']);

    // Insert data into database
    $sql = "INSERT INTO users (full_name, email, date_of_birth, contact_num, fav_food, movies_rating, radio_rating, eat_out_rating, watch_tv_rating)
    VALUES ('$fullName', '$email', '$dateOfBirth', '$contactNumber', '$favoriteFoods', '$movies', '$radio', '$eatOut', '$watchTv')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            
        Swal.fire({
          icon: 'success',
          text: 'survey submitted successfuly',
          confirmButtonText: 'OK',
          confirmButtonColor: '#3085d6',
                
        }).then(function(){
              window.location.href='http://localhost/survey/pages/home.html';

        });
      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Close connection
$conn->close();
?>
