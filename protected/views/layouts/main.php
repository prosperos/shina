<?php
$diam = Menu::model()->selectDiamShiny();
$width_shiny = Menu::model()->selectWidthShiny();
$height_shiny = Menu::model()->selectHeightShiny();

$producer_shine = Menu::model()->selectProducerShine();
$shiny = Menu::model()->CountShiny();
$category_shin = Menu::model()->categoryShin();
$query = Menu::model()->countShiny();



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fotolab</title>
    <link href="<?php echo  Yii::app()->request->getBaseUrl(true); ?>/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="<?php echo  Yii::app()->request->getBaseUrl(true); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo  Yii::app()->request->getBaseUrl(true); ?>/css/main_style.css">

    <link rel="stylesheet" href="<?php echo  Yii::app()->request->getBaseUrl(true); ?>/js/ui/jquery-ui.css">



    <!--      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->


    <!--      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->




    <!--      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo  Yii::app()->request->getBaseUrl(true); ?>/js/ui/jquery-ui.js"></script>

</head>
<body>
      <header class="home">
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

              </div>
              <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="shiny">ШИНЫ</a></li>
                      <li><a href="diski">ДИСКИ</a></li>
                      <li><a href="garantia">ГАРАНТИЯ</a></li>
                      <li><a href="oplata">ОПЛАТА&ДОСТАВКА</a></li>
                      <li><a href="news">НОВОСТИ</a></li>
                      <li><a href="articles">СТАТЬИ</a></li>
                      <li><a href="avtoslovarik">АВТОСЛОВАРЬ</a></li>
                      <li><a href="contacts">КОНТАКТЫ</a></li>

                  </ul>
              </div><!--/.nav-collapse -->
          </div>
      </div>кількість шин шин

        <div class="container main">
            <div class="row">
                <div class="col-md-4 logo">
                    <h1><a href="/">ВАША ШИНА</a></h1>
                </div>
                <div class="col-md-5 search">
                        <form id="find-form" class="form-horizontal" action="/site/search" method="GET">
                            <input type="text" placeholder="Поиск по Производителю и/или Модели" name="q" class="form-control" id="searchInput">
                        </form>
                </div>
                <div class="col-md-3 money show-cart">
                        <span class="count">1</span>
                        <span class="price">0 ГРН</span></div>
            </div>
            <div class="row displaynone">
                <p>МНЕ НУЖНЫ</p>
                    <div class="col-md-6 ">

                        <div class="col-md-12 left_shiny">
                            <div class="find row">
                                <div class="col-md-12">
                                    <form action="found" id="tire-find-form" class="form-horizontal" method="post">
                                        <ul class="select-type" id="carType">
                                            <?php for ($i = 0;$i<count($category_shin);$i++){ ?>
                                                <li ><a class="data" data-my="<?php echo $category_shin[$i]['id'];?>"><?php echo $category_shin[$i]['name'];?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <div class="select-img row">
                                            <div class="col-md-4 to-center">
                                                <img src="images/radius_icon.png" alt="" class="img-responsive">
                                                <label>Диаметр</label>
                                                <div class="dropdown">
                                                    <div class="old">
                                                        <select  name="diam" class="diam">
                                                            <option value="0">Любой</option>
                                                            <?php for ($i = 0;$i<count($diam);$i++){ ?>

                                                                <option value="<?php echo $diam[$i]['name'];?>"><?php echo $diam[$i]['name'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="images/width_icon.png" alt="" class="img-responsive">
                                                <label>Ширина</label>
                                                <div class="dropdown">
                                                    <div class="old">
                                                        <select name="width" class="width">
                                                            <option value="0">Любая</option>
                                                            <?php for ($i = 0; $i<count($width_shiny); $i++){ ?>
                                                                <option value="<?php echo $width_shiny[$i]['width'];?>"><?php echo $width_shiny[$i]['width'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 to-center">
                                                <img src="images/height_icon.png" alt="" class="img-responsive">
                                                <label>Высота</label>
                                                <div class="dropdown">
                                                    <div class="old">
                                                        <select name="height" class="height">
                                                            <option value="0">Любая</option>
                                                            <?php for ($i = 0; $i<count($height_shiny); $i++){ ?>
                                                                <option value="<?php echo $height_shiny[$i]['height'];?>"><?php echo $height_shiny[$i]['height'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="other-option row">
                                            <div class="col-md-6">

                                                <label>Сезон</label>
                                                <br>
                                                <a  data-id="1" id="summerA" class="seasonIcon seasonClick active"></a>
                                                <a data-id="2" id="winterA" class="seasonIcon seasonClick"></a>
                                                <a data-id="3" id="allSeasonA" class="seasonIcon seasonClick"></a>

                                                <input type="hidden" class="my_hidden_seacon" value="1" name="season">
                                            </div>
                                            <div class="col-md-6">
                                                <label for=""> Производитель</label>
                                                <div class="dropdown bottom">
                                                    <div class="old">
                                                        <select name="producer"  class="producer">
                                                            <option value="0">Любой</option>
                                                            <?php for ($i = 0; $i<count($producer_shine); $i++){ ?>
                                                                <option value="<?php echo $producer_shine[$i]['id'];?>"><?php echo $producer_shine[$i]['name'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider-calc row">
                                            <div class="col-md-12">


                                                    <div class="form-group">
                                                        <label for="name" class="col-md-2 control-label">Диапазон цены</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" name="price_slider" id="price_slider">
                                                            <div id="slider-range"></div>
                                                        </div>
                                                    </div>


                                            </div>
                                        </div>
                                        <input class="send-calc" type="submit" value="Подобрать">
                                        <div class="find-box" style="display: inline-block;">Найдено<br>
                                            <i>кількість </i> <span class="count_shin"> </span>&nbsp;шин</div>
                                    </form >


                                </div>
                            </div>


<!--                            <div class="count">-->
<!--                                --><?php //echo count($query);?>
<!--                            </div>-->


                        </div>
                        <div class="search-box">
                                <h2>шини</h2>
                            </div>
                    </div>
            </div>

                <div class="col-md-6">

                </div>
            </div>
      </header>


<?php

                      echo $content;
?>









<footer>

</footer>


    </div>
  <script src="<?php echo  Yii::app()->request->getBaseUrl(true); ?>/js/myskript.js"></script>
  </body>

</html>


