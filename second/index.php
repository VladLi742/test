<?php
  require_once 'Twig/Autoloader.php';
  Twig_Autoloader::register();
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader);
  $template = $twig->loadTemplate('index.html');
  $php_array = array(
	array(
    'id' => '22295159',
    'src' => 'css/img/e7096ae995aa4aabf959d52fbb3h--kartiny-i-panno-obemnaya-kartina-pavlin.jpg',
    'title' => 'Объёмная картина павлин',
    'link_on_work' => 'kartiny-i-panno-obemnaya-kartina-pavlin',
    'name_of_master' => 'Ксения Акелина (clubakm)',
    'link_on_shop' => 'clubakm',
    'price' => '20&nbsp;000',
    'status_of_work' => '1',
  ),
	array(
    'id' => '22294585',
    'src' => 'css/img/b0b55a4366bb57f21b28a565c492--kartiny-i-panno-almaznaya-kartina-lvinoe-semejstvo.jpg',
    'title' => 'Алмазная картина Львиное семейство',
    'link_on_work' => 'kartiny-i-panno-almaznaya-kartina-lvinoe-semejstvo',
    'name_of_master' => 'Инна (zaharova78)',
    'link_on_shop' => 'zaharova78',
    'price' => '800',
    'status_of_work' => '1',
  ),
	array(
    'id' => '22294507',
    'src' => 'css/img/b36778d55f8e8805907ea58cachs--kartiny-i-panno-sovy.jpg',
    'title' => 'Совы',
    'link_on_work' => 'kartiny-i-panno-sovy',
    'name_of_master' => 'Skullinsky',
    'link_on_shop' => 'skullinsky',
    'price' => '37&nbsp;322&nbsp;72',
    'status_of_work' => '1',
  ),
  array(
    'id' => '22293607',
    'src' => 'css/img/82e595d6357d9463bf31ac12e1yr--kartiny-i-panno-akvarel-delfiny-akvarelnaya-kartina-30-20-sm.jpg',
    'title' => 'Акварель &quot;Дельфины&quot; 30см х 20см',
    'link_on_work' => 'kartiny-i-panno-akvarel-delfiny-akvarelnaya-kartina-30-20-sm',
    'name_of_master' => 'Татьяна (HavroshechkaArt)',
    'link_on_shop' => 'havroshechkaart',
    'price' => '1000',
    'status_of_work' => '1',
  ),
	array(
    'id' => '22051859',
    'src' => 'css/img/224e557c8f4102021f61988eb5z0--kartiny-i-panno-kruzhevnoe-pano-dlya-okon-muhomory-v-korzinke.jpg',
    'title' => 'Кружевное пано для окон  &quot; Мухоморы в корзинке&quot;',
    'link_on_work' => 'panno-kruzhevnoe-pano-dlya-okon-muhomory-v-korzinke',
    'name_of_master' => '&quot;Kruzhevnaya feya&quot;',
    'link_on_shop' => 'engelstern',
    'price' => '1749&nbsp;90',
    'status_of_work' => '1',
  ),
	array(
    'id' => '22105953',
    'src' => 'css/img/633a1d0014184d8ac0a56c427b9g--kartiny-i-panno-kruzhevnoe-pano-dlya-okon-ptichka-i-podsolnuh.jpg',
    'title' => 'Кружевное пано для окон  &quot; Птичка и подсолнух&quot;',
    'link_on_work' => 'kartiny-i-panno-kruzhevnoe-pano-dlya-okon-ptichka-i-podsolnuh',
    'name_of_master' => '&quot;Kruzhevnaya feya&quot;',
    'link_on_shop' => 'engelstern',
    'price' => '1609&nbsp;90',
    'status_of_work' => '1',
  ),
	array(
    'id' => '22106105',
    'src' => 'css/img/cd5a354d8346fade241d85ca620v--kartiny-i-panno-kruzhevnoe-pano-dlya-okon-belochka-s-podsolnu.jpg',
    'title' => 'Кружевное пано для окон  &quot; Белочка с подсолнухом&quot',
    'link_on_work' => 'kartiny-i-panno-kruzhevnoe-pano-dlya-okon-belochka-s-podsolnu',
    'name_of_master' => '&quot;Kruzhevnaya feya&quot;',
    'link_on_shop' => 'engelstern',
    'price' => '1749&nbsp;90',
    'status_of_work' => '1',
  ),
	array(
    'id' => '22292753',
    'src' => 'css/img/0ef4b4c2f3f8f8d50c73f8c61b5n--kartiny-i-panno-zimorodok-kitajskaya-zhivopis.jpg',
    'title' => 'Зимородок. Китайская живопись.',
    'link_on_work' => 'kartiny-i-panno-zimorodok-kitajskaya-zhivopis',
    'name_of_master' => 'Ирина (zimorodok64)',
    'link_on_shop' => 'zimorodok64',
    'price' => '7500',
    'status_of_work' => '1',
  ),
);
$title = 'Ярмарка Мастеров - ручная работа, handmade';
echo htmlspecialchars_decode($template->render(array(
  'php_array' => $php_array,
  'title' => $title,
)));
?>
