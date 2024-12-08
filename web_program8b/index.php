<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Student Records</h2>
        <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "students";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch student records
            $sql = "SELECT usn, name, address FROM students";
            $result = $conn->query($sql);

            // Store records in an array
            $students = array();
            while($row = $result->fetch_assoc()) {
                $students[] = $row;
            }

            // Display student records before sorting
            echo "<h3>Before Sorting</h3>";
            echo "<table>";
            echo "<tr><th>USN</th><th>Name</th><th>Address</th></tr>";
            foreach($students as $student) {
                echo "<tr>";
                echo "<td>" . $student['usn'] . "</td>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['address'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Selection Sort Algorithm
            function selectionSort(&$arr) {
                $n = count($arr);
                for ($i = 0; $i < $n - 1; $i++) {
                    $min_index = $i;
                    for ($j = $i + 1; $j < $n; $j++) {
                        if ($arr[$j]['usn'] < $arr[$min_index]['usn']) {
                            $min_index = $j;
                        }
                    }
                    // Swap the found minimum element with the first element
                    $temp = $arr[$min_index];
                    $arr[$min_index] = $arr[$i];
                    $arr[$i] = $temp;
                }
            }

            // Sort the student records
            selectionSort($students);

            // Display student records after sorting
            echo "<h3>After Sorting</h3>";
            echo "<table>";
            echo "<tr><th>USN</th><th>Name</th><th>Address</th></tr>";
            foreach($students as $student) {
                echo "<tr>";
                echo "<td>" . $student['usn'] . "</td>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['address'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Close connection
            $conn->close();
        ?>
    </div>
</body>
</html>
