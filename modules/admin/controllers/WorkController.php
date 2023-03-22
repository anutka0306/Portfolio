<?php

namespace app\modules\admin\controllers;

use app\models\Categories;
use app\Models\Works;
use app\Models\WorksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorkController implements the CRUD actions for Works model.
 */
class WorkController extends DefaultController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Works models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Works model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Works model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $categories = Categories::find()->all();
        $model = new Works();

        if ($this->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->thumb = UploadedFile::getInstance($model, 'thumb');

            if($model->upload() && $model->uploadThumb()) {
                if ($model->load($this->request->post())) {
                    if(UploadedFile::getInstance($model, 'image')) {
                        $model->setAttribute('image', UploadedFile::getInstance($model, 'image')->name);
                    }
                    if(UploadedFile::getInstance($model, 'thumb')) {
                        $model->setAttribute('thumb', UploadedFile::getInstance($model, 'thumb')->name);
                    }
                    if($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    $model->loadDefaultValues();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Updates an existing Works model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Categories::find()->all();

        if ($this->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->thumb = UploadedFile::getInstance($model, 'thumb');

            if($model->upload() && $model->uploadThumb()) {
                if ($model->load($this->request->post())) {
                    if(UploadedFile::getInstance($model, 'image') != NULL) {
                        $model->setAttribute('image', UploadedFile::getInstance($model, 'image')->name);
                    } else{
                        $old_image = Works::find()->where(['id' => $id])->select('image')->one();
                        $model->setAttribute('image', $old_image->image);
                    }

                    if(UploadedFile::getInstance($model, 'thumb') != null) {
                        $model->setAttribute('thumb', UploadedFile::getInstance($model, 'thumb')->name);
                    } else{
                       $old_thumb = Works::find()->where(['id' => $id])->select('thumb')->one();
                       $model->setAttribute('thumb', $old_thumb->thumb);
                    }
                    if($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    $model->loadDefaultValues();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Deletes an existing Works model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Works model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Works the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Works::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
