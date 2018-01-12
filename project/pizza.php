<?php
    class Pizza {
        static function makePizza($data) {
            $db = mysqli_connect('localhost', 'root', '', 'pizza');
            $db->query('SET CHARSET utf8');

            $data = array_chunk($data, true);

            $dough = $data[0];
            $sause = $data[1];
            $filling = $data[2];
            $price = $data[3];

            $query = "INSERT INTO orders
            (SELECT ingredient, price WHERE id = $dough)
            UNION
            (SELECT ingredient, price WHERE id = $sause)
            UNION
            (SELECT ingredient, price WHERE id = $filling)
            ";

            // if ($result = mysqli_query($db, $query)) {
            //     mysqli_free_result($result);
            //     mysqli_close($db);
            //     echo json_encode(true);
            // } else {
            //     echo json_encode(false);
            // }
        }
    }
?>
