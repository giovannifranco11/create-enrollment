<?php
    
    
    //1. Connect to Database
    $host = "localhost";
    $dbname = "universidad";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //2. Build SQL sentence
    $sql = "SELECT id, name FROM students";
    //3. Prepare SQL sentence
    $q = $cnx->prepare($sql);
    //4. Execute SQL sentence
    $result = $q->execute();
    $students = $q->fetchALL();


    //2. Build SQL sentence
    $sql = "SELECT id, name FROM course";
    //3. Prepare SQL sentence
    $q = $cnx->prepare($sql);
    //4. Execute SQL sentence
    $result = $q->execute();
    $courses = $q->fetchALL();

    //var_dump($students);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create-Enrollment</title>
</head>
<body>    
    <form action="save-enrollment.php" method="POST">
        Student 
        <select name="student" id="">

        <?php
            for($i=0; $i<count($students); $i++){
        ?>
            <option value="<?php echo $students[$i]["id"] ?>">
                <?php echo $students[$i]["name"] ?>
            </option>
        <?php
            }
        ?>            
        <select/>
        <br/><br/>
        Course 
        <select name="course" id="">

        <?php
            for($i=0; $i<count($courses); $i++){
        ?>
            <option value="<?php echo $courses[$i]["id"] ?>">
                <?php echo $courses[$i]["name"] ?>
            </option>
        <?php
            }
        ?>
            
        <select/>

        <br/>
        <br/>
        Shift: 
        <input name="shift" type="radio" value="0"/> Day
        <input name="shift" type="radio" value="1"/> Night
        <br/><br/>
        
        <input type="submit" value="Create enrollment">

    </form>
     




</body>
</html>