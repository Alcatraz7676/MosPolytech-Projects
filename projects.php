<?php

    function getProjectsList($type, $page) {

        $db_host = "std-mysql";
	    $db_user = "std_226";
	    $db_password = "mysqlpassword";
        $db_name = "std_226";

        $mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        if (mysqli_connect_errno())
            return showMessage('Ошибка подключения к БД: '.mysqli_connect_error());
        
        if ($type !== 'all')
            $sql_res = mysqli_query($mysqli, 'SELECT COUNT(*) FROM projects WHERE fac="'.$type.'"');
        else
            $sql_res = mysqli_query($mysqli, 'SELECT COUNT(*) FROM projects');

        if (mysqli_errno($mysqli) == 0 && $row = mysqli_fetch_row($sql_res)) {

            if (!$TOTAL = $row[0])
                return showMessage('Для этого направления пока нет проектов');

            // Количество карточек на одной странице
            $items = 3;

            $PAGES = ceil($TOTAL/$items);
            if ( $page >= $TOTAL )
                $page = $TOTAL - 1;

            if ($type !== 'all')
                $sql = 'SELECT * FROM projects WHERE fac="'.$type.'" LIMIT '.($page*$items).', '.$items;
            else
                $sql = 'SELECT * FROM projects LIMIT '.($page*$items).', '.$items;
            $sql_res = mysqli_query($mysqli, $sql);

            $res = '';
            while($row = mysqli_fetch_assoc($sql_res)) {
                $res.='<div class="card">
                <div class="view overlay">
                <img class="card-img-top" src="img/'.$row['image'].'" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
            
              <div class="card-body">
              <h4 class="card-title"><strong>'.$row['title'].'</strong></h4>
              <div class="row justify-content-between">
                <h4 class="card-title col-lg-7 col-md-9"><strong>Руководитель: '.$row['head'].'</strong></h4>
                <h4 class="pr-5 pl-3" style="width: 150px;"><i class="fas fa-users" aria-hidden="true" style="padding-right: 8px;"></i>'.$row['people'].'/'.$row['capacity'].'</h4>
                </div>
                <p class="card-text">'.$row['description'].'</p>
                <hr>
                <!-- Button -->
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#!" class="text-primary">
                        <h4 class="waves-effect waves-light"><strong>Записаться</strong></h4>
                    </a>
                </div>
              </div>
            </div>';
            }
            if($PAGES > 1) {
                $res.='<nav class="d-flex justify-content-center">
                <ul class="pagination pg-blue" style="margin: 0">';
                for ($i=0; $i < $PAGES; $i++) { 
                    if( $i == $page )
                        $res.='<li class="page-item active"><a class="page-link disabled">'.($i+1).'<span class="sr-only">(current)</span></a></li>';
                    else
                        $res.='<li class="page-item"><a class="page-link" href="?cat=projects&pg='.$i.'&subcat='.$type.'">'.($i+1).'</a></li>';
                }
                $res.='</ul>
                </nav>';
            }
            return $res;
        }

        return showMessage('Неизвестная ошибка');

    }

    function showMessage($text) {
        return '<h1 class="d-flex justify-content-center">'.$text.'</h1>';
    }
?>