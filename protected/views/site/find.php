<?php

//var_dump($take_shuny);
//exit;


?>
<style>.displaynone{display: none;}</style>
<div class="container">
    <ul class="breadcrumb"><li class="this-page">Вы находитесь здесь: <a href="/">Главная</a></li>
        <li><span class="path">Подбор шин</span></li>
    </ul>
    <div class="row">
        <div class="col-md-3 filter">
            <form action="find" method="get" class="form-horizontal">
                <h1 class="down-20">
                    Фильтр
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Тип шин</label>
                        <div class="dropdown">
                            <div>
                                <select>
                                    <option>Любой</option>
                                    <option>ведущие</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 icon">
                                <img class="" src="images/radius_icon_78x45.png" alt="">
                            </div>
                            <div class="col-md-7">
                                <label>Диаметр</label>
                                <div class="dropdown">
                                    <div>
                                        <select>
                                            <option>Любой</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 icon">
                                <img class="minus-margin" src="images/width_icon_68x57.png" alt="">
                            </div>
                            <div class="col-md-7">
                                <label>Ширина</label>
                                <div class="dropdown">
                                    <div>
                                        <select>
                                            <option class="active">Любая</option>
                                            <option>45</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 icons">
                                <img class="" src="images/height_icon_77x45.png" alt="">
                            </div>
                            <div class="col-md-7">
                                <label>Высота</label>
                                <div class="dropdown">
                                    <div>
                                        <select>
                                            <option class="active">Любая</option>
                                            <option>120</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="seasons">
                                <label>Cезон</label>
                                <br>
                                <a id="summerA" class="seasonIcon" ></a>
                                <a id="winterA" class="seasonIcon" ></a>
                                <a id="allSeasonA" class="seasonIcon active" ></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Шипованая</label>
                            <div class="dropdown">
                                <div>
                                    <select>
                                        <option class="active">Любая</option>
                                        <option>Да</option>
                                        <option>Нет</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Производитель</label>
                            <div class="dropdown">
                                <select>
                                    <option class="active">Любой</option>
                                    <option>ACCELERA</option>
                                    <option>ACHILLES</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Цена, &nbsp;₴</label>
                            <div class="slider slider-horizontal">
                                <div class="slider-track">
                                    полоса ціни
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="inputPrice">от
                                <input id="minPriceTire" type="text" placeholder="мин" name="Tire[minPrice]" value="445" class="form-control">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="inputPrice">до
                                <input id="maxPriceTire" type="text" placeholder="макс" name="Tire[maxPrice]" value="15435" class="form-control">
                            </p>
                        </div>
                    </div>
                    <div class="find row">
                        <div class="col-md-12">
                            <button class="send-calc">Подобрать</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-9 goods">
            <div class="row">
                <div class="col-md-4 text-left-x">
                    <h1 class="catalog">Шины<span class="count new"><?php if (!empty($take_shuny)){ echo count($take_shuny);}else{echo 0;} ?></span></h1>
                </div>
                <div class="col-md-8 text-left-xs">
                    <form action="foundation" id="sort0rder-form" class="form-vertical">
                        <label>Сортировать по:</label>
                        <div class="dropdown">
                            <span class="old">
                                <select class="sortSelect1"  name="Tire_sort">
                                    <option value="title ASC">По названию А-Я</option>
                                    <option value="title DESC">По названию Я-А</option>
                                    <option value="price ASC" >От дешевых к дорогим</option>
                                    <option value="price DESC">От дорогих к дешевым</option>
                                    <option value="created DESC">По новизне</option>
                                </select>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">

                <?php
                if (!empty($take_shuny)){
                    foreach ($take_shuny as $my_shin){
                        ?>

                    <div class="col-md-12 listView">

                        <div id="w0" class="list-view">
                            <div class="my_container">
                                <div class="some-good-container">
                                    <div class="code text-right color-gray">Код товара: <?php echo $my_shin['id'];?></div>
                                    <div class="some-good">
                                        <div class="col-md-3 equalHeight">
                                            <a class="fancybox" href="images/atrezzo-sh402-695.jpg" data-pjax="0">
                                                <img class="img-responsive" src="images/atrezzo-sh402-695_thumb.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9 equalHeight border-left">
                                            <h3>
                                                <img class="season" src="images/<?php if ($my_shin['seacons'] == 1){echo "summer_icon.png";}
                                                                                    else if ($my_shin['seacons'] == 2) {echo "winter_icon.png";}
                                                                                    else{ echo "all_season_icon.png";}?>">
                                                    <a href="/shiny/" data-pjax="0"><?php echo $my_shin['title'];?></a>

                                            </h3>
                                            <div class="row">

                                                <div class="col-md-7">
                                                    <table >
                                                        <tbody><tr>
                                                            <td>Ширина</td>
                                                            <td><?php echo $my_shin['height'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Высота</td>
                                                            <td><?php echo $my_shin['width'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Диаметр</td>
                                                            <td>R <?php echo $my_shin['diam'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Индекс скорости</td>
                                                            <td><?php echo $my_shin['index_spead'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Индекс нагрузки</td>
                                                            <td><?php echo $my_shin['index_hight'];?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-5">
                                                    <div>
                                                        <div class="price margin-10"><?php echo $my_shin['price'];?> ГРН</div>
                                                        <form action="cart/add" method="get" id="w1"class="form-horizontal">
                                                            <input type="hidden" name="category_id" value="1">
                                                            <input type="hidden" name="id" value="3412">
                                                            <button class="send-calc  buy">купить</button>
                                                            <span>X<input type="number" name="qty" placeholder="1" value="1"></span>
                                                            <div class="exist">Есть в наличии</div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php           }
                }else{
                    echo "По даних параметрах шин немає";
                }
?>




            </div>
        </div>
    </div>
</div>
<script>
    $('.sortSelect1').change(function () {

        type_sort = $(this).val();
        my_diam = <?php echo $_POST['diam'];?>;
        my_width = <?php echo $_POST['width'];?>;
        my_height = <?php echo $_POST['height'];?>;
        my_season = <?php echo $_POST['season'];?>;
        my_producer = <?php echo $_POST['producer'];?>;

        $.ajax({
            type: "POST",
            url: "sort",
            data: {'sort' :type_sort, 'diam' :my_diam, 'width' :my_width, 'height' :my_height, 'season' :my_season, 'producer' :my_producer},
            success: function (data) {

                $('.my_container').html(data);


            }
        });

    });
</script>