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

<body style="height: 100vh">

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
          aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="dropdown user-dropdown" style="align-self: flex-end;">
            <button class="btn btn-primary dropdown-toggle btn-blue btn-rounded" type="button" id="dropdownMenu1" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Максим Овчинников</button>
        
            <div class="dropdown-menu dropdown-primary dropdown-user">
              <a class="dropdown-item" href="#"><i class="fal fa-user-circle fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Личный кабинет</a>
              <a class="dropdown-item" href="#"><i class="far fa-calendar fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>График</a>
              <a class="dropdown-item" href="#"><i class="fas fa-file-alt fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Мои проекты</a>
              <a class="dropdown-item" href="#"><i class="fas fa-power-off fa-lg" aria-hidden="true" style="padding-right: 8px;"></i>Выйти</a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
          <a class="navbar-brand mr-5" href="#">Проекты МосПолитеха</a>
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

  <main>
    <!-- Card -->
    <div class="card">

        <!-- Card image -->
        <div class="view overlay">
          <img class="card-img-top" src="img/1.png" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
      
        <!-- Card content -->
        <div class="card-body">
      
          <!-- Project name -->
          <h4 class="card-title"><strong>VR energetics</strong></h4>
          <div class="row justify-content-between">
            <!-- Project Head -->
            <h4 class="card-title col-lg-7 col-md-9"><strong>Руководитель: Савельев Илья Леонидович</strong></h4>
            <!-- Project's people count -->
            <h4 class="pr-5 pl-3" style="width: 150px;"><i class="fas fa-users" aria-hidden="true" style="padding-right: 8px;"></i>5/6</h4>
          </div>
          <!-- Project description -->
          <p class="card-text">VR ENERGETICS это проект, направленный на повышение эффективности проектирования зданий, коммуникаций и инфраструктуры города в целом. Основными задачами проекта является разработка оптимальной технологии работы с 3D моделями, внедрение BIM и CIM технологий в процесс проектирования в таких областях как строительство, энергетика, и др. Одной из неотъемлемых частей проекта должна стать разработка VR проекта т.к. данная технология позволяет значительно расширить возможности как проектировщика, так и конечного пользователя разрабатываемого продукта.</p>
          <hr>
          <!-- Button -->
          <div class="d-flex justify-content-center align-items-center">
            <a href="#!" class="text-primary">
              <h4 class="waves-effect waves-light"><strong>Записаться</strong></h4>
            </a>
          </div>
      
        </div>
      
    </div>
    <div class="card">

        <div class="view overlay">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
      
        <div class="card-body">
      
          <h4 class="card-title"><strong>Биодизель</strong></h4>
          <div class="row justify-content-between">
              <h4 class="card-title col-lg-7 col-md-9"><strong>Руководитель: Апелинский Дмитрий Викторович</strong></h4>
              <h4 class="pr-5 pl-3" style="width: 150px;"><i class="fas fa-users" aria-hidden="true" style="padding-right: 8px;"></i>4/6</h4>
          </div>
          <p class="card-text">ООО НПП "Агродизель" занимается организацией строительства первого отечественного промышленного производства биоэтанола и метиловых (этиловых) эфиров растительного масла. Подготовлен пилотный проект. С целью участия в выставках требуется разработать и изготовить действующую модель установки для получения метиловых (этиловых) эфиров растительного масла. Наличие производства этих возобновляемых, экологически чистых топлив позволит заместить бензин и дизельное топливо. Тем самым уменьшится выброс углекислого газа и вредных веществ с отработавшими газами двигателя, сократится потребление топлива нефтяного происхождения.</p>
          <hr>
          <div class="d-flex justify-content-center align-items-center">
            <a href="#!" class="text-primary">
              <h4 class="waves-effect waves-light"><strong>Записаться</strong></h4>
            </a>
          </div>
      
        </div>
      
    </div>
    <div class="card">

        <div class="view overlay">
          <img class="card-img-top" src="img/3.jpg" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
      
        <div class="card-body">
      
          <h4 class="card-title"><strong>PUSHKAforum</strong></h4>
          <div class="row justify-content-between">
              <h4 class="card-title col-lg-7 col-md-9"><strong>Руководитель: Храповицкий Виктор Алексеевич</strong></h4>
              <h4 class="pr-5 pl-3" style="width: 150px;"><i class="fas fa-users" aria-hidden="true" style="padding-right: 8px;"></i>3/8</h4>
          </div>
          <p class="card-text">Конкурсный проект для Международного форума инноваций в промышленном дизайне PUSHKA. В первую очередь проекты будут интересны для студентов обучающихся по направлениям «Промышленный дизайн» и «Дизайн средств транспорта». Проекты могут выполняться согласно методике «Production design» – проектирование промышленно производимого продукта; и по методике «Advanced design» - проектирование продвинутых, перспективных продуктов, для реализации потребностей пользователя.</p>
          <hr>
          <!-- Button -->
          <div class="d-flex justify-content-center align-items-center">
            <a href="#!" class="text-primary">
              <h4 class="waves-effect waves-light"><strong>Записаться</strong></h4>
            </a>
          </div>
      
        </div>
      
      </div>

      <nav class="d-flex justify-content-center">
        <ul class="pagination pg-blue" style="margin: 0">
          <li class="page-item active"><a class="page-link">1 <span class="sr-only">(current)</span></a></li>
          <li class="page-item">
            <a class="page-link">2</a>
          </li>
          <li class="page-item"><a class="page-link">3</a></li>
          <li class="page-item"><a class="page-link">4</a></li>
          <li class="page-item"><a class="page-link">5</a></li>
          <li class="page-item">
              <a class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
        </ul>
      </nav>
  </main>

  <footer>
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