<?php



class SiteController extends Controller
{
    public $defaultAction = "index";
    public $currentCatalogue = null;



    public function actionIndex()
    {


    $mytest = Menu::model()->selectGallaryName();
	//$product_combo = CatalogTree::model()->allCombo();   
   //$mytest = MyModel::model()->selectGallaryName();


     $diam = menu::model()->selectDiamShiny();

     $this->render('index', array('diam'=> $diam));
   /*     $check_for_gallery = array();
        $product_combo = CatalogTree::model()->allCombo(); 
        $dataGallary = Article::model()->selectImagesSlider(1);                
        $this->currentCatalogue = CatalogTree::model()->with(array('products', 'products.parameters', 'parent', 'descendants'))->find('parent.chpu = :catalogue AND t.chpu = :category', array(':catalogue' => 'katalog', ':category' => 'uslugi'));  
        $this->render('index', array('combo'=>$product_combo,'gallary'=>$dataGallary,'catalogue' => $this->currentCatalogue));*/


        //$cats = menu::find()->all();

    }


   





    public function actionShiny(){
        $this->render('shiny');
    }

    public function actionDiski(){
        $this->render('diski');
    }
    public function actionGarantia(){
        $this->render('garantia');
    }
    public function actionOplata(){
        $this->render('oplata');
    }
    public function actionNews(){
        $this->render('news');
    }
    public function actionArticles(){
        $this->render('articles');
    }
    public function actionAvtoslovarik(){
        $this->render('avtoslovarik');
    }
    public function actionContacts(){
        $this->render('contacts');
    }
    public function actionAjaxCat(){
         $idcat = $_POST['id_cat'];
            if ($idcat == 1 ){
                $query = Menu::model()->countShiny();
            }else{
                $query = Menu::model()->selectShiny($idcat);
            }
        echo count($query);
    }
    public function actionAjaxType(){

        $type_auto = $_POST['type_auto'];

        $obg_diam = $_POST['diam'];
        $obg_width = $_POST['width'];
        $obg_height = $_POST['height'];

        if (!empty($_POST['season'])){
            $season = $_POST['season'];
        }else{
            $season = 0;
        }
        if (!empty($_POST['my_producer'])){$producer = $_POST['my_producer'];}else{ $producer = 0; }

        $take_shuny = Menu::model()->selectDiamWidthHeight($obg_diam, $obg_width, $obg_height, $season, $producer, $type_auto);

            if (!empty($take_shuny)){
                echo count($take_shuny);
            }else{
                echo 0;
            }

    }

    public function actionFind(){

        if (!empty($_POST['diam'])){
            $obg_diam = $_POST['diam'];
        }else{
            $obg_diam = 0;
        }
        if (!empty($_POST['width'])){
            $obg_width = $_POST['width'];
        }else{
            $obg_width = 0;
        }

        if (!empty($_POST['height'])){
            $obg_height = $_POST['height'];
        }else{
            $obg_height = 0;
        }


        if (!empty($_POST['type_auto'])){$type_auto = $_POST['type_auto'];}else{$type_auto = 0;}

        if (!empty($_POST['season'])){$season = $_POST['season'];}else{$season = 0;}
        if (!empty($_POST['my_producer'])){$producer = $_POST['my_producer'];}else{ $producer = 0; }

        $take_shuny = Menu::model()->selectDiamWidthHeight($obg_diam, $obg_width, $obg_height, $season, $producer, $type_auto);

var_dump($_POST);
        $this->render('find', array('take_shuny' => $take_shuny));
    }

    function actionSort(){
        $type_sort = $_POST['sort'];


        $my_diam =  $_POST['diam'];
        $my_width =  $_POST['width'];
        $my_height =  $_POST['height'];
        $my_season =  $_POST['season'];
        $my_producer =  $_POST['producer'];


        $sort_shiny = Menu::model()->sortShiny($type_sort, $my_diam, $my_width, $my_height, $my_season, $my_producer);



        foreach ($sort_shiny as $my_shin){
        ?>



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


        <?php
        }
    }


}

?>
