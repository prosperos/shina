<?php

/**
 * @property Struct $page
 */
class Controller extends CController
{
    public $menu = array();
    public $breadcrumbs = array();
    public $struct = null;
    protected $_page = null;

    public $layout = "//layouts/main";

    public $metaTitle = '';
    public $metaKeywords = '';
    public $metaDescription = '';

    public $SETTINGS;

    public function init()
    {
        parent::init();
//        $this->breadcrumbs['Главная'] = '/';
  //      $this->menu = Menu::model()->with('menu_elements.struct')->findByPk(1);
//        print_r($this->menu);
        // Site Settings
  //      $this->SETTINGS = Settings::model()->findByPk(1);
    }

    protected function applyMeta($model)
    {
        if ($model === null)
            return;

        if ($model instanceof Struct)
        {
            $this->metaTitle = $model->struct_meta->title;
            $this->metaKeywords = $model->struct_meta->keywords;
            $this->metaDescription = $model->struct_meta->description;
        }
        elseif ($model instanceof Article || $model instanceof News || $model instanceof Goodtoknow)
        {
            $this->metaTitle = $model->meta_title;
            $this->metaKeywords = $model->meta_keywords;
            $this->metaDescription = $model->meta_description;
        }
        elseif ($model instanceof CatalogTree)
        {
            $this->metaTitle = $model->seo_title;
            $this->metaKeywords = $model->seo_keywords;
            $this->metaDescription = $model->seo_description;
        }
        elseif ($model instanceof CatalogProducts)
        {
            // Related meta model exists
            if (!$model->meta)
                return;

            $this->metaTitle = $model->meta->title;
            $this->metaKeywords = $model->meta->keywords;
            $this->metaDescription = $model->meta->description;
        }
    }

    public function setPage($value)
    {
        $this->_page = $value;
        $this->applyMeta($value);
    }

    public function getPage()
    {
        return $this->_page;
    }
}

?>
