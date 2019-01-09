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
  <link href="css/style.css" rel="stylesheet">
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
                <div class="dropdown user-dropdown" style="align-self: flex-end;">
                    <button class="btn btn-primary dropdown-toggle btn-blue btn-rounded" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">'.$_SESSION['user']['name'].' '.$_SESSION['user']['surname'].'</button>
        
                    <div class="dropdown-menu dropdown-primary dropdown-user">
                        <a class="dropdown-item" href="#"><i class="fal fa-user-circle fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Личный кабинет</a>
                        <a class="dropdown-item" href="#"><i class="far fa-calendar fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>График</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-file-alt fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Мои проекты</a>
                        <a class="dropdown-item" href="?logout"><i class="fas fa-power-off fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Выйти</a>
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
              if(!isset($_GET['cat'])) {
                $_GET['cat'] = 'projects';
              }
              if($_GET['cat'] === 'projects' && !isset($_GET['subcat'])) {
                $_GET['subcat'] = 'all';
              }
              echo '<li class="nav-item dropdown mr-4 mega-dropdown';
              if($_GET['cat'] === 'projects')
                echo ' active';
              echo '">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Проекты
              </a>
              <div class="dropdown-menu mega-menu v-2 z-depth-1 elegant-color px-3" aria-labelledby="navbarDropdownMenuLink2">
                    <div class="row">
                      <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'all')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=all">Все</a>
              <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'transport')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=transport">Транспорт</a>
              <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'tech')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=tech">Технология</a>
              <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'him')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=him">Химбиотех</a>
              <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'energ')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=energ">Энергетика</a>
              <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'design')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=design">Дизайн</a>
              <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'social')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=social">Социальные Технологии</a>
              <a class="nav-link mx-3';
              if($_GET['cat'] === 'projects' && $_GET['subcat'] === 'initiativ')
                echo ' selected';
              echo '" href="/?cat=projects&subcat=initiativ">Инициативные проекты</a>
                  </div>
                </div>
              </li>
              <li class="nav-item mr-4';
              if($_GET['cat'] === 'users')
                echo ' active';
              echo '">
                <a class="nav-link" href="/?cat=users">Участники</a>
              </li>
              <li class="nav-item mr-4';
              if($_GET['cat'] === 'teams')
                echo ' active';
              echo '">
                <a class="nav-link" href="/?cat=teams">Команды</a>
              </li>';
            ?>
          </ul>
        </div>
        
      </div>
    </nav>
  </header>

  <main class="flex-fill">
    <?php

      if (($_GET['cat'] !== 'projects' || ($_GET['subcat'] !== 'all' && $_GET['subcat'] !== 'transport' && $_GET['subcat'] !== 'tech' && $_GET['subcat'] !== 'him' && $_GET['subcat'] !== 'energ' && $_GET['subcat'] !== 'design' && $_GET['subcat'] !== 'social' && $_GET['subcat'] !== 'initiativ')) && $_GET['cat'] !== 'users' && $_GET['cat'] !== 'teams') {
        echo '<h1 class="d-flex justify-content-center">404 PAGE NOT FOUND</h1>
              <style type="text/css">
                footer {
                  position: absolute;
                  
                }
              </style>';
      } else {
        if($_GET['cat'] == 'projects') {
          include 'projects.php';

          if(!isset($_GET['pg']) || $_GET['pg'] < 0)
            $_GET['pg'] = 0;

          if(!isset($_GET['subcat']))
            $_GET['subcat'] = 'all';

          echo getProjectsList($_GET['subcat'], $_GET['pg']);
        }
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