<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property string $id
 * @property string $real_title
 * @property string $trans_title
 */
class Menu extends IWLActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



// Создание своих методов

	public function selectGallaryName()
    {
      $connection=Yii::app()->db;
      $sql = "SELECT * FROM  menu";
      $sqlCommand = $connection->CreateCommand($sql);
      
        $rows = $sqlCommand->queryAll();
        return $rows;                
    }

    public function selectDiamShiny(){
        $connection=Yii::app()->db;
        $sql = "SELECT * FROM diams_shin";
        $sql_query = $connection->CreateCommand($sql);

        $rows = $sql_query->queryAll();
        return $rows;


    }

    public function selectHeightShiny(){
        $connection=Yii::app()->db;
        $sql = "SELECT * FROM height_shiny";
        $sql_query = $connection->CreateCommand($sql);

        $rows = $sql_query->queryAll();
        return $rows;
    }

    public function selectWidthShiny(){
        $connection=Yii::app()->db;
        $sql = "SELECT * FROM width_shiny";
        $sql_query = $connection->CreateCommand($sql);

        $rows = $sql_query->queryAll();
        return $rows;
    }

    public function selectProducerShine(){
        $connection=Yii::app()->db;
        $sql = "SELECT * FROM producer_shine";
        $sql_query = $connection->CreateCommand($sql);

        $rows = $sql_query->queryAll();
        return $rows;
    }

    public function categoryShin(){
        $connection=Yii::app()->db;
        $sql = "SELECT * FROM category_shin";
        $sql_query = $connection->CreateCommand($sql);

        $rows = $sql_query->queryAll();
        return $rows;
    }

    public function countShiny(){
        $connection=Yii::app()->db;
        $sql = "SELECT * FROM shiny";
        $sql_query = $connection->CreateCommand($sql);
        $rows = $sql_query->queryAll();
        return $rows;
    }

    public function selectShiny($idcat){
        $connection=Yii::app()->db;
        $sql = "SELECT * FROM shiny WHERE type_auto = $idcat";
        $sql_query = $connection->CreateCommand($sql);
        $rows = $sql_query->queryAll();
        return $rows;
    }

    public function selectDiamWidthHeight($obg_diam, $obg_width, $obg_height, $season, $producer, $type_auto){

        $connection=Yii::app()->db;
        $my_and = "";

        if (!empty($obg_diam)){
            $my_diam = "diam = $obg_diam";
            if (!empty($my_and)){
                $my_and = $my_and." AND $my_diam";
            }else{
                $my_and = $my_diam;
            }
        }else{
            $my_diam = "";
        }
        if (!empty($obg_width)){
            $my_width = "width = $obg_width";

                if (!empty($my_and)){
                    $my_and = $my_and." AND $my_width";
                }else{
                    $my_and = $my_width;
                }
        }else{
            $my_width = "";
        }
        if (!empty($obg_height)){
            $my_height = "height = $obg_height";

                if (!empty($my_and)){
                    $my_and = $my_and." AND $my_height";
                }else{
                    $my_and =  $my_height;
                }
        }else {
            $my_height = "";
        }

        if (!empty($season)){
            $my_season = "seacons = $season";

            if (!empty($my_and)){
                $my_and = $my_and." AND $my_season";
            }else{
                $my_and =  $my_season;
            }
        }else {
            $my_season = "";
        }

        if (!empty($producer)){
            $my_producer = "producer = $producer";

            if (!empty($my_and)){
                $my_and = $my_and." AND $my_producer";
            }else{
                $my_and =  $my_producer;
            }
        }else {
            $my_producer = "";
        }

        if (!empty($type_auto) ){
            if ($type_auto == 1){
                $my_type_auto = "";
            }else{
                $my_type_auto = "type_auto = $type_auto";

                if (!empty($my_and)){
                    $my_and = $my_and." AND $my_type_auto";
                }else{
                    $my_and =  $my_type_auto;
                }
            }
        }else {
            $my_type_auto = "";
        }


        $sql = "SELECT * FROM shiny WHERE $my_and";
        echo $sql;

        $sql_query = $connection->CreateCommand($sql);
        $rows = $sql_query->queryAll();
        if (!empty($rows)){
            return $rows;
        }else{
            return 0;
        }
    }

    function sortShiny($type_sort, $my_diam, $my_width, $my_height, $my_season, $my_producer){
        $connection=Yii::app()->db;

        if ($type_sort == 'title ASC'):
            $type_sort = 'title ASC';
        elseif ($type_sort == 'title DESC'):
            $type_sort = 'title DESC';
        elseif ($type_sort == 'price ASC'):
            $type_sort = 'price ASC';
        elseif ($type_sort == 'price DESC'):
            $type_sort = 'price DESC';
        else:
            $type_sort = 'id DESC';
        endif;




        $sql = "SELECT * FROM shiny ORDER BY $type_sort";
//        var_dump($sql);
        $sql_query = $connection->CreateCommand($sql);
        $rows = $sql_query->queryAll();
        return $rows;
    }

    public function selectSort($obg_diam, $obg_width, $obg_height, $season, $producer, $type_auto, $type_sort){

        $connection=Yii::app()->db;
        $my_and = "";

        if ($type_sort == 'title ASC'):
            $type_sort = 'title ASC';
        elseif ($type_sort == 'title DESC'):
            $type_sort = 'title DESC';
        elseif ($type_sort == 'price ASC'):
            $type_sort = 'price ASC';
        elseif ($type_sort == 'price DESC'):
            $type_sort = 'price DESC';
        else:
            $type_sort = 'id DESC';
        endif;

        if (!empty($obg_diam)){
            $my_diam = "diam = $obg_diam";
            if (!empty($my_and)){
                $my_and = $my_and." AND $my_diam";
            }else{
                $my_and = $my_diam;
            }
        }else{
            $my_diam = "";
        }
        if (!empty($obg_width)){
            $my_width = "width = $obg_width";

            if (!empty($my_and)){
                $my_and = $my_and." AND $my_width";
            }else{
                $my_and = $my_width;
            }
        }else{
            $my_width = "";
        }
        if (!empty($obg_height)){
            $my_height = "height = $obg_height";

            if (!empty($my_and)){
                $my_and = $my_and." AND $my_height";
            }else{
                $my_and =  $my_height;
            }
        }else {
            $my_height = "";
        }

        if (!empty($season)){
            $my_season = "seacons = $season";

            if (!empty($my_and)){
                $my_and = $my_and." AND $my_season";
            }else{
                $my_and =  $my_season;
            }
        }else {
            $my_season = "";
        }

        if (!empty($producer)){
            $my_producer = "producer = $producer";

            if (!empty($my_and)){
                $my_and = $my_and." AND $my_producer";
            }else{
                $my_and =  $my_producer;
            }
        }else {
            $my_producer = "";
        }

        if (!empty($type_auto) ){
            if ($type_auto == 1){
                $my_type_auto = "";
            }else{
                $my_type_auto = "type_auto = $type_auto";

                if (!empty($my_and)){
                    $my_and = $my_and." AND $my_type_auto";
                }else{
                    $my_and =  $my_type_auto;
                }
            }
        }else {
            $my_type_auto = "";
        }


        $sql = "SELECT * FROM shiny WHERE $my_and";
        echo $sql;

        $sql_query = $connection->CreateCommand($sql);
        $rows = $sql_query->queryAll();
        if (!empty($rows)){
            return $rows;
        }else{
            return 0;
        }
    }



}
