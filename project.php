<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Проекты МосПолитеха - Главная</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <link href="css/main.css" rel="stylesheet">
  <link href="css/project.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

<?php
    session_start();

    if(isset($_GET['logout'])) {
        unset($_SESSION['user']);
    }
?>

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
          aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            if(isset($_SESSION['user'])) {
                echo '
                <div class="dropdown user-dropdown align-self-end">
                    <button class="btn btn-primary dropdown-toggle btn-blue btn-rounded" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">'.$_SESSION['user']['name'].' '.$_SESSION['user']['surname'].'</button>
        
                    <div class="dropdown-menu dropdown-primary dropdown-user">
                        <a class="dropdown-item" href="#"><i class="fal fa-user-circle fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Личный кабинет</a>
                        <a class="dropdown-item" href="#"><i class="far fa-calendar fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>График</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-file-alt fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Мои проекты</a>
                        <a class="dropdown-item" href="?project='.$_GET['project'].'&logout"><i class="fas fa-power-off fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Выйти</a>
                    </div>
                </div>';
            } else {
                echo '<a class="btn btn-primary btn-blue btn-rounded btn-login" href="login-page.php" style="align-self: flex-end;" type="button">Войти</a>';
            }
        ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
          <a class="navbar-brand mr-5" href="/?cat=projects&subcat=all">Проекты МосПолитеха</a>
          <ul class="navbar-nav mt-lg-0">
            <?php

                if(isset($_GET['project'])) {
                    $db_host = "std-mysql";
                    $db_user = "std_226";
                    $db_password = "mysqlpassword";
                    $db_name = "std_226";

                    $mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_name);

                    $sql_res = mysqli_query($mysqli, 'SELECT * FROM projects WHERE id='.$_GET['project']);
                    $project = mysqli_fetch_assoc($sql_res);

                    $category = '';
                    
                    echo '<li class="nav-item dropdown mr-4 mega-dropdown active">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Проекты
                    </a>
                    <div class="dropdown-menu mega-menu v-2 z-depth-1 elegant-color px-3" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="row">
                            <a class="nav-link mx-3" href="/?cat=projects&subcat=all">Все</a>
                    <a class="nav-link mx-3';
                    if($project['fac'] === 'transport') {
                        echo ' selected';
                        $category = 'Транспорт';
                    }
                    echo '" href="/?cat=projects&subcat=transport">Транспорт</a>
                    <a class="nav-link mx-3';
                    if($project['fac'] === 'tech') {
                        echo ' selected';
                        $category = 'Технология';
                    }
                    echo '" href="/?cat=projects&subcat=tech">Технология</a>
                    <a class="nav-link mx-3';
                    if($project['fac'] === 'him') {
                        echo ' selected';
                        $category = 'Химбиотех';
                    }
                    echo '" href="/?cat=projects&subcat=him">Химбиотех</a>
                    <a class="nav-link mx-3';
                    if($project['fac'] === 'energ') {
                        echo ' selected';
                        $category = 'Энергетика';
                    }
                    echo '" href="/?cat=projects&subcat=energ">Энергетика</a>
                    <a class="nav-link mx-3';
                    if($project['fac'] === 'design') {
                        echo ' selected';
                        $category = 'Дизайн';
                    }
                    echo '" href="/?cat=projects&subcat=design">Дизайн</a>
                    <a class="nav-link mx-3';
                    if($project['fac'] === 'social') {
                        echo ' selected';
                        $category = 'Социальные Технологии';
                    }
                    echo '" href="/?cat=projects&subcat=social">Социальные Технологии</a>
                    <a class="nav-link mx-3';
                    if($project['fac'] === 'initiativ') {
                        echo ' selected';
                        $category = 'Инициативные проекты';
                    }
                    echo '" href="/?cat=projects&subcat=initiativ">Инициативные проекты</a>
                        </div>
                        </div>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link" href="/?cat=users">Участники</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link" href="/?cat=teams">Команды</a>
                    </li>';
                }
            ?>
          </ul>
        </div>
        
      </div>
    </nav>
  </header>

  <main class="flex-fill">
    <?php
        if (!isset($project)) {
            echo '<h1 class="d-flex justify-content-center">404 PAGE NOT FOUND</h1>';
        } else {
            if(isset($_POST['role']) && isset($_POST['add']) && isset($_SESSION['user'])) {

                $user_id = htmlspecialchars($_SESSION['user']['id']);
                $name = htmlspecialchars($_SESSION['user']['name']);
                $surname = htmlspecialchars($_SESSION['user']['surname']);
                $course = htmlspecialchars($_SESSION['user']['course']);
                $role = htmlspecialchars($_POST['role']);
                $project_id = htmlspecialchars($_GET['project']);

                mysqli_query($mysqli, 'INSERT INTO requests (user_id, name, surname, course, role, project_id) VALUES ("'.$user_id.'", "'.$name.'", "'.$surname.'", "'.$course.'", "'.$role.'", "'.$project_id.'")');
            } else if(isset($_POST['cancel_req']) && isset($_POST['id'])) {
                mysqli_query($mysqli, 'DELETE FROM requests WHERE user_id='.$_POST['id'].' AND project_id='.$_GET['project']);
            } else if(isset($_POST['cancel_apr']) && isset($_POST['id'])) {
                mysqli_query($mysqli, 'INSERT INTO requests (user_id, name, surname, course, role, project_id) SELECT user_id, name, surname, course, role, project_id FROM approved WHERE user_id='.$_POST['id'].' AND project_id='.$_GET['project']);
                mysqli_query($mysqli, 'DELETE FROM approved WHERE user_id='.$_POST['id'].' AND project_id='.$_GET['project']);
            } else if(isset($_POST['add_req']) && isset($_POST['id'])) {
                mysqli_query($mysqli, 'INSERT INTO approved (user_id, name, surname, course, role, project_id) SELECT user_id, name, surname, course, role, project_id FROM requests WHERE user_id='.$_POST['id'].' AND project_id='.$_GET['project']);
                mysqli_query($mysqli, 'DELETE FROM requests WHERE user_id='.$_POST['id'].' AND project_id='.$_GET['project']);
            }

            $requests = mysqli_query($mysqli, 'SELECT * FROM requests WHERE project_id='.$_GET['project']);
            $requests_num = mysqli_fetch_row(mysqli_query($mysqli, 'SELECT COUNT(*) FROM requests WHERE project_id='.$_GET['project']))[0];
            $approved = mysqli_query($mysqli, 'SELECT * FROM approved WHERE project_id='.$_GET['project']);
            $approved_num = mysqli_fetch_row(mysqli_query($mysqli, 'SELECT COUNT(*) FROM approved WHERE project_id='.$_GET['project']))[0];

            // Проверка на то явялется ли пользователь создателем проекта
            if($_SESSION['user']['type'] == 'teacher')
                $is_project_creator = (mysqli_fetch_assoc(mysqli_query($mysqli, 'SELECT * FROM projects WHERE id='.$_GET['project']))['creator_id'] == $_SESSION['user']['id']) ? TRUE : FALSE;

            echo '
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Проекты</a></li>
                        <li class="breadcrumb-item"><a href="/?subcat='.$project['fac'].'">'.$category.'</a></li>
                        <li class="breadcrumb-item active">'.$project['title'].'</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="img/'.$project['image'].'" alt="Card image cap">
                    </div>
            
                    <div class="card-body">
                        <h4 class="card-title"><strong>'.$project['title'].'</strong></h4>
                        <div class="row justify-content-between">
                            <h4 class="card-title col-lg-7 col-md-9"><strong>Руководитель: '.$project['head'].'</strong></h4>
                            <h4 class="pr-5 pl-3" style="width: 150px;"><i class="fas fa-users" aria-hidden="true" style="padding-right: 8px;"></i>'.$approved_num.'/'.$project['capacity'].'</h4>
                        </div>
                        <p class="card-text">'.$project['description'].'</p>';

            if($requests_num) {
                echo '<hr>
                <div class="d-flex justify-content-center align-items-center">
                    <h5><strong>Поданные заявки</strong></h5>
                </div>
                <div class=\'table-responsive\'>
                    <!--Table-->
                    <table id="tablePreview" class="table table-striped table-sm text-nowrap">
                        <!--Table head-->
                        <thead>
                            <tr>
                                <th><strong>Имя</strong></th>
                                <th><strong>Фамилия</strong></th>
                                <th><strong>Курс</strong></th>
                                <th><strong>Роль</strong></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>';

                while($request = mysqli_fetch_assoc($requests)) {
                    echo '<tr>
                            <td class="align-middle">'.$request['name'].'</td>'.
                            '<td class="align-middle">'.$request['surname'].'</td>'.
                            '<td class="align-middle">'.$request['course'].'</td>'.
                            '<td class="align-middle">'.$request['role'].'</td>';
                    if($request['user_id'] == $_SESSION['user']['id'] || $_SESSION['user']['type'] == 'admin' || ($_SESSION['user']['type'] == 'teacher' && $is_project_creator))
                        echo '<td class="align-middle">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="'.$request['user_id'].'">
                                <input type="submit" class="btn btn-primary btn-rounded btn-sm" name="cancel_req" value="Отменить">
                            </form>
                        </td>';
                    else
                        echo '<td class="align-middle"></td>';
                    if($_SESSION['user']['type'] == 'admin' || ($_SESSION['user']['type'] == 'teacher' && $is_project_creator))
                        echo '<td class="align-middle">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="'.$request['user_id'].'">
                                <input type="submit" class="btn btn-primary btn-rounded btn-sm" name="add_req" value="Добавить">
                            </form>
                        </td>';
                    else
                        echo '<td class="align-middle"></td>';
                    echo '</tr>';
                }
                echo '      </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>';
            }

            if($approved_num) {
                echo '<div class="d-flex justify-content-center align-items-center">
                    <h5><strong>Сформированная команда</strong></h5>
                </div>
                <div class=\'table-responsive\'>
                    <!--Table-->
                    <table id="tablePreview" class="table table-striped table-sm text-nowrap">
                        <!--Table head-->
                        <thead>
                            <tr>
                                <th><strong>Имя</strong></th>
                                <th><strong>Фамилия</strong></th>
                                <th><strong>Курс</strong></th>
                                <th><strong>Роль</strong></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>';

                while($approved_item = mysqli_fetch_assoc($approved)) {
                    echo '<tr>
                            <td class="align-middle">'.$approved_item['name'].'</td>'.
                            '<td class="align-middle">'.$approved_item['surname'].'</td>'.
                            '<td class="align-middle">'.$approved_item['course'].'</td>'.
                            '<td class="align-middle">'.$approved_item['role'].'</td>';
                    if($approved_item['user_id'] == $_SESSION['user']['id'] || $_SESSION['user']['type'] == 'admin' || ($_SESSION['user']['type'] == 'teacher' && $is_project_creator))
                        echo '<td class="align-middle">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="'.$approved_item['user_id'].'">
                                <input type="submit" class="btn btn-primary btn-rounded btn-sm" name="cancel_apr" value="Отменить">
                            </form>
                        </td>';
                    else
                        echo '<td class="align-middle"></td>';
                    echo '</tr>';
                }
                echo '      </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>';
            }

            if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'student') {
                // Проверка на то не отправил ли заявку текущий пользователь
                $result = mysqli_query($mysqli, 'SELECT * FROM requests WHERE user_id="'.$_SESSION['user']['id'].'" AND project_id='.$_GET['project']);
                $exists = (mysqli_num_rows($result)) ? TRUE : FALSE;

                if(!$exists) {
                    echo '<form action="" method="post">
                            <div class="row justify-content-center d-flex align-items-center text-center">
                                <input type="text" class="form-control col-8 col-sm-4 mr-4" name="role" placeholder="Ваша роль">
                                <input type="submit" class="btn btn-primary btn-rounded" name="add" value="Подать заявку">
                            </div>
                        </form>';
                }
            }
            echo '      </div>
                    </div>
                </div>';
        }
    ?>
  </main>

  <footer class="py-3">
    © 2019 Московский политехнический университет
  </footer>

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