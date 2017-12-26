<?php
    class Ingrid {
        static function getIngred($id) {
            $db = mysqli_connect('localhost', 'root', '', 'pizza');
            $db->query('SET CHARSET utf8');

            $query = "SELECT ingredient, summary, price FROM total_ingredient WHERE id = $id";

            if ($result = mysqli_query($db, $query)) {
                $rows = [];
                while ($row = mysqli_fetch_assoc($result)) {
                  $rows[] = $row;
                }

                mysqli_free_result($result);
                mysqli_close($db);

                echo json_encode(array($rows));
            }
        }
    }
?>
