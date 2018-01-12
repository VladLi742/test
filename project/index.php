<?php
    header("Content-Type: text/html; charset=UTF-8");
    require_once 'ingred.php';
    require_once 'pizza.php';
    // require_once 'Twig/Autoloader.php';
    // Twig_Autoloader::register();
    // $loader = new Twig_Loader_Filesystem('templates');
    // $twig = new Twig_Environment($loader);
    // $template = $twig->loadTemplate('index.html');

    // echo htmlspecialchars_decode($template->render(
    //     array(
    //         'static_data' => $static_data,
    //         'title' => $title,
    //     )
    // ));

    // Абстрактная пицца
    class Object {
        static function getIngred($id) {
            Ingrid::getIngred($id);
        }

        static function makeOrder($data) {
            Pizza::makePizza($data);
        }
    }

    if (isset($_POST['data'])) {
        Object::getIngred($_POST['data']);
    }

    if (isset($_POST['order'])) {
        Object::makeOrder($_POST['order']);
    }

    // function getDataFromDB($condition) {
    //     $db = mysqli_connect('localhost', 'root', '', 'pizza');
    //     $db->query('SET CHARSET utf8');

    //     switch ($condition) {
    //         case "1":
    //             $table = 'Ingrid';
    //             $field = 'id = 1';
    //             break;
    //         case "2":
    //             $table = 'Ingrid';
    //             $field = 'id = 2';
    //             break;
    //     }

    //     if ($table) {
    //         $query = "SELECT * FROM $table WHERE $field";
    //     } else {
    //         echo json_encode(false);
    //     }

    //     if ($result = mysqli_query($db, $query)) {
    //         $rows = [];
    //         while ($row = mysqli_fetch_assoc($result)) {
    //           $rows[] = $row;
    //         }
            
    //         mysqli_free_result($result);
    //         mysqli_close($db);

    //         echo json_encode($rows);
    //     }
    // }



// getStaticData();
// function getStaticData() {
//     $db = mysqli_connect('localhost', 'root', '', 'pizza');
//     $db->query('SET CHARSET utf8');

//     $query = "SELECT id FROM total_ingredient";

//     if ($result = mysqli_query($db, $query)) {
//         $static_data = [];
//         while ($row = mysqli_fetch_assoc($result)) {
//           $static_data[] = $row;
//         }
        
//         mysqli_free_result($result);
//         mysqli_close($db);

//         echo json_encode($static_data);
//     }
// }


?>
