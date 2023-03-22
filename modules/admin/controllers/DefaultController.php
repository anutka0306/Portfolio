<?php

namespace app\modules\admin\controllers;


use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = 'admin';
    public function beforeAction($action)
    {
        $session = \Yii::$app->session;
        $session->open();
        if(!$session->has('auth_site_admin')){
            $this->redirect('/site/login');
            return false;
        }
        return parent::beforeAction($action);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
