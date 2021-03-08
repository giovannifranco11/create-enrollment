<?php
    $student = $_REQUEST["student"];
    $course = $_REQUEST["course"];
    $shift = $_REQUEST["shift"];
    
    //1. Connect to Database
    $host = "localhost";
    $dbname = "universidad";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //2. Build SQL sentence
    $sql = "INSERT INTO enrollment (id, student_id, course_id, shift) VALUES(NULL, '$student', '$course', '$shift')";

    //3. Prepare SQL sentence
    $q = $cnx->prepare($sql);

    //4. Execute SQL sentence
    $result = $q->execute();   

    if($result){
        echo "Enrollment saved successfully";
    }
    else{
        echo "Error to create enrollment";
           
    }

?>