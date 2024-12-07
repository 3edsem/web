<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

   

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";
        // Database connection
        $conn = mysqli_connect($servername, $username, $password,
$dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch student records
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        echo " <h1>Before sort </h1>
        <table>
                <tr>
                    <th>USN</th>
                    <th>Name</th>
                    <th>address</th>
                </tr>";

        foreach ($students as $student) {
            echo "<tr>
                    <td>{$student['usn']}</td>
                    <td>{$student['name']}</td>
                    <td>{$student['address']}</td>
                  </tr>";
        }

        echo "</table>";
        // Selection Sort
        $n = count($students);
        for ($i = 0; $i < $n - 1; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($students[$j]['usn'] > $students[$minIndex]['usn']) {
                    $minIndex = $j;
                }
            }
            $temp = $students[$i];
            $students[$i] = $students[$minIndex];
            $students[$minIndex] = $temp;
        }
        

        // Display sorted records
        echo "<h1>After sort </h1>
        <table>
                <tr>
                    <th>USN</th>
                    <th>Name</th>
                    <th>address</th>
                </tr>";

        foreach ($students as $student) {
            echo "<tr>
                    <td>{$student['usn']}</td>
                    <td>{$student['name']}</td>
                    <td>{$student['address']}</td>
                  </tr>";
        }

        echo "</table>";

        $conn->close();
    ?>

</body>
</html>
