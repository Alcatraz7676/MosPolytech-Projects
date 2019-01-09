<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Проекты МосПолитеха - Войти</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <link href="css/login.css" rel="stylesheet">
</head>
    <body class="d-flex flex-column h-100">

        <?php 
            session_start();
		?>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                        <a class="navbar-brand mr-5" href="/?cat=projects&subcat=all">Проекты МосПолитеха</a>
                        <ul class="navbar-nav mt-lg-0">
                            <li class="nav-item dropdown mr-4 mega-dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Проекты</a>
                                <div class="dropdown-menu mega-menu v-2 z-depth-1 elegant-color px-3" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="row">
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=all">Все</a>
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=transport">Транспорт</a>
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=tech">Технология</a>
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=him">Химбиотех</a>
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=energ">Энергетика</a>
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=design">Дизайн</a>
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=social">Социальные Технологии</a>
                                        <a class="nav-link mx-3" href="/?cat=projects&subcat=initiativ">Инициативные проекты</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item mr-4">
                                <a class="nav-link" href="/?cat=users">Участники</a>
                            </li>
                            <li class="nav-item mr-4">
                                <a class="nav-link" href="/?cat=teams">Команды</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-fill intro-2 mask h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

                                <!--Form with header-->
                                <div class="card wow fadeIn" data-wow-delay="0.3s">
                                    <div class="card-body">

                                    <form name="auth" action="" method="post">

                                        <!--Header-->
                                        <div class="form-header purple-gradient">
                                            <h3>Авторизация</h3>
                                        </div>
                                        <?php

                                            if(!isset($_SESSION['user']) && isset($_POST['login']) &&
                                            isset($_POST['password'])) {
                                                
                                                /* Попытка аутентефикации */
                                                $db_host = "std-mysql";
                                                $db_user = "std_226";
                                                $db_password = "mysqlpassword";
                                                $db_name = "std_226";

                                                $mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_name);

                                                if (!mysqli_connect_errno()) {

                                                    $sql_res = mysqli_query($mysqli, 'SELECT COUNT(*) FROM users');

                                                    if (mysqli_errno($mysqli) == 0 && $row = mysqli_fetch_row($sql_res)) {
                                                        $users_count = $row[0];
                                                        $sql = 'SELECT * FROM users';
                                                        $sql_res = mysqli_query($mysqli, $sql);
                                                        while($row = mysqli_fetch_assoc($sql_res)) {
                                                            if($row['login'] == $_POST['login'] && $row['password'] == $_POST['password']) {
                                                                $_SESSION['user'] = $row;
                                                                setcookie('login', $row['login']);
                                                                setcookie('password', $row['password']);
                                                                echo "<script type='text/javascript'>window.top.location='http://project.std-226.ist.mospolytech.ru';</script>";
                                                                //header('Location http://project.std-226.ist.mospolytech.ru');
                                                                exit;
                                                            }
                                                        }
                                                        echo showMessage('Неверный логин или пароль');
                                                    }
                                                } else
                                                    showMessage('Ошибка подключения к БД: '.mysqli_connect_error());
                                            }

                                            if (!isset($_SESSION['user'])) {
                                                echo '<div class="md-form">
                                                    <i class="fa fa-user prefix white-text"></i>
                                                    <input type="text" name="login" id="orangeForm-name" class="form-control"';

                                                if (isset($_POST['login']))
                                                    echo ' value="'.$_POST['login'].'"';
                                                else if(array_key_exists('login', $_COOKIE))
                                                    echo ' value="'.$_COOKIE['login'].'"';
                                                    
                                                echo '>
                                                    <label for="orangeForm-name">Логин</label>
                                                </div>
                                            
                                                <div class="md-form">
                                                    <i class="fa fa-lock prefix white-text"></i>
                                                    <input type="password" name="password" id="orangeForm-pass" class="form-control"';

                                                if(array_key_exists('password', $_COOKIE))
                                                    echo ' value="'.$_COOKIE['password'].'"';

                                                echo '>
                                                    <label for="orangeForm-pass">Пароль</label>
                                                </div>';
                                            }

                                            function showMessage($text) {
                                                return '<h3 class="d-flex justify-content-center">'.$text.'</h3>';
                                            }
                                        ?>
                                        <div class="text-center">
                                            <button class="btn purple-gradient btn-lg">Войти</button>
                                        </div>

                                        </form>

                                    </div>
                                </div>
                                <!--/Form with header-->

                            </div>
                        </div>
                    </div>
        </main>

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.js"></script>
    </body>
</html>