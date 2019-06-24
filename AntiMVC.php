<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="/path_insert.php">
        <!-- renderizado del formulario -->
        <?php
        if(isset($_POST['form_data'])){
            $name = $_POST['form_data']['name'];
            $phone = $_POST['form_data']['phone'];

            $sql = "INTSERT INTO people(name, phone) VALUES('".$name."', '".$phone."')";
            $mysqli = new mysqli("localhost", "my_user", "my_password", "my_db");
            $msqli->query($sql);
        }
        ?>
    </form>
</body>
</html>