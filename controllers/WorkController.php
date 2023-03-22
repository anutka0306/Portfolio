<?php

namespace app\controllers;

use app\models\Works;
use yii\web\Controller;

class WorkController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @param int $id ID
     */
    public function actionItem(int $id)
    {
        $model = new Works();
        $work = $model->getWorkById($id);
        return $this->render('item', [
            'work' => $work
        ]);
    }

    public function actionGameMultiply()
    {
        $this->layout = 'game';
        return $this->render('game_multiply');

    }

}
