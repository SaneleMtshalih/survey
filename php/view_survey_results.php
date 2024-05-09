<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<title>Result Survey Page</title>
</head>
<body>

<div id="surveyContainer">
    <div id="surveyHeader">
        <h1>_Surveys</h1>
        <div>
            <a href="../pages/home.html"><button>Fill out survey</button></a>
            <button id="viewResultsButton">View Survey Results</button>
        </div>
    </div>
    
    <div id="surveyResultsContainer">
        <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '' ;
        $dbname = 'survey';

        // Establish a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get survey results
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Calculate total number of surveys completed
            $total_surveys = $result->num_rows;

            // Calculate average age, oldest and youngest age
            $total_age = 0;
            $oldest_age = PHP_INT_MIN;
            $youngest_age = PHP_INT_MAX;

            // Variables to count people who like Pizza, Pasta, and Pap and Wors, and calculate eat out rating
            $pizza_count = 0;
            $pasta_count = 0;
            $papa_wors_count = 0;
            $total_eat_out_rating = 0;

            // Arrays to store ratings for each activity
            $movies_ratings = [];
            $radio_ratings = [];
            $eat_out_ratings = [];
            $watch_tv_ratings = [];

            while ($row = $result->fetch_assoc()) {
                // Calculate age
                $dob = new DateTime($row['date_of_birth']);
                $today = new DateTime();
                $age = $dob->diff($today)->y;
                $total_age += $age;

                // Update oldest and youngest age
                if ($age > $oldest_age) {
                    $oldest_age = $age;
                }
                if ($age < $youngest_age) {
                    $youngest_age = $age;
                }

                // Count people who like Pizza, Pasta, and Pap and Wors
                if (strpos($row['fav_food'], 'Pizza') !== false) {
                    $pizza_count++;
                }
                if (strpos($row['fav_food'], 'Pasta') !== false) {
                    $pasta_count++;
                }
                if (strpos($row['fav_food'], 'Papawors') !== false) {
                    $papa_wors_count++;
                }

                // Calculate eat out rating
                $total_eat_out_rating += $row['eat_out_rating'];

                // Store ratings for each activity
                $movies_ratings[] = $row['movies_rating'];
                $radio_ratings[] = $row['radio_rating'];
                $eat_out_ratings[] = $row['eat_out_rating'];
                $watch_tv_ratings[] = $row['watch_tv_rating'];
            }

            // Calculate average age
            $average_age = $total_age / $total_surveys;

            // Calculate percentages of people who like Pizza, Pasta, and Pap and Wors
            $pizza_percentage = round(($pizza_count / $total_surveys) * 100, 1);
            $pasta_percentage = round(($pasta_count / $total_surveys) * 100, 1);
            $papa_wors_percentage = round(($papa_wors_count / $total_surveys) * 100, 1);

            // Calculate average eat out rating
            $average_eat_out_rating = round($total_eat_out_rating / $total_surveys, 1);

            // Calculate average ratings for each activity
            $average_movies_rating = round(array_sum($movies_ratings) / count($movies_ratings), 1);
            $average_radio_rating = round(array_sum($radio_ratings) / count($radio_ratings), 1);
            $average_eat_out_rating = round(array_sum($eat_out_ratings) / count($eat_out_ratings), 1);
            $average_watch_tv_rating = round(array_sum($watch_tv_ratings) / count($watch_tv_ratings), 1);

            // Output survey results
            echo "<h2>Survey Results</h2>";
            echo "Total number of surveys: $total_surveys <br>";
            echo "Average age: $average_age <br>";
            echo "Oldest person who participated in survey: $oldest_age years <br>";
            echo "Youngest person who participated in survey: $youngest_age years <br>";
            echo "Percentage of people who like Pizza: $pizza_percentage% <br>";
            echo "Percentage of people who like Pasta: $pasta_percentage% <br>";
            echo "Percentage of people who like Pap and Wors: $papa_wors_percentage% <br>";
            echo "Average eat out rating: $average_eat_out_rating <br>";
            echo "People who like to watch movies: $average_movies_rating <br>";
            echo "People who like to listen to radio: $average_radio_rating <br>";
            echo "People who like to eat out: $average_eat_out_rating <br>";
            echo "People who like to watch TV: $average_watch_tv_rating <br>";
        } else {
            // If no surveys available
            echo "No Surveys Available.";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>

