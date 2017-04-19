<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'',
    'charset' => 'UTF-8',
    'language' => 'ru',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.enums.*',
        'application.extensions.*',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool
        /*
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>false,//array('*', '::1'),
        ),
        */
    ),

	// application components
    'components'=>array(
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                /*
                'gii' => 'gii',
                'gii/<controller:\w+>' => 'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                */

                'captcha/generate' => 'captcha/generate',

                '' => 'site/index',
                //'testpage' => 'site/test',
                'shiny' => 'site/shiny',
                'diski' => 'site/diski',
                'garantia' => 'site/garantia',
                'oplata' => 'site/oplata',
                'news' => 'site/news',
                'articles' => 'site/articles',
                'avtoslovarik' => 'site/avtoslovarik',
                'contacts' => 'site/contacts',
                'ajaxcat' => 'site/ajaxCat',
                'ajaxtype' => 'site/ajaxType',
                'authors' => 'site/authors',
                'found' => 'site/find',
                'sort' => 'site/sort',
            ),
        ),
        /*
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js'=> '/js/libs/jquery-1.7.min.js',
                'jquery.min.js'=> '/js/libs/jquery-ui-1.9.1.custom.js',
            ),
        ),
        */

        'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                'class'=>'CFileLogRoute',
                'levels'=>'error, warning',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'parser',
                    'logFile' => 'parser.log',
                ),
                // DB log
                array(
                'class' => 'CProfileLogRoute',
                'levels' => 'profile',
                'enabled' => true,
                ),
            ),
        ),
        'cache'=>array(
            'class'=>'system.caching.CDummyCache',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'less'=>array(
            'class' => 'LessCompiler',
            'compiledPath' => 'application.assets.css', // path to store compiled css files
            'formatter' => 'lessjs', // - lessjs / compressed / classic , see http://leafo.net/lessphp/docs/#output_formatting for details
            'forceCompile' => true, // passing in true will cause the input to always be recompiled
            'disabled' => false, // if set to true .less files will not compile if .css file found
        ),
        'email'=>array(
            'class'=>'application.extensions.email.Email',
            'delivery'=>'php',
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
    ),
);
