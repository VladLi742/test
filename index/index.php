<?php
    header("Content-Type: text/html; charset=UTF-8");

    if (isset($_POST['data'])) {
        $data = $_POST['data'];
        getDataFromDB($data);
    }

    if (isset($_POST['reminder'])) {
        $data = $_POST['reminder'];
        echo json_encode(true);
    }

    function getDataFromDB($condition) {
        $db = mysqli_connect('localhost', 'user', '123', 'catalog-site');
        $db->query( "SET CHARSET utf8" );

        $field = 'activity = 1';

        switch ($condition) {
            case "active-category":
                $table = 'category';
                break;
            case "active-good":
                $table = 'goods';
                break;
            case "1":
                $table = 'goods';
                $field = 'id = 1';
                break;
            case "2":
                $table = 'goods';
                $field = 'id = 2';
                break;
            case "3":
                $table = 'goods';
                $field = 'id = 3';
                break;
        }

        if ($table) {
            $query = "SELECT * FROM $table WHERE $field";
        } else {
            echo json_encode(false);
        }

        if ($result = mysqli_query($db, $query)) {
            $rows = [];
            while ($row = mysqli_fetch_assoc($result)) {
              $rows[] = $row;
            }
            mysqli_free_result($result);
            mysqli_close($db);
            
            echo json_encode($rows);
        }
    }
?>
