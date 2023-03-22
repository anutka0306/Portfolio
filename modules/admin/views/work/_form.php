<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\redactor\widgets\Redactor;

/** @var yii\web\View $this */
/** @var app\Models\Works $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\Models\Categories $categories */
?>

<div class="works-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(
            \yii\helpers\ArrayHelper::map($categories, 'id', 'name')
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb')->fileInput() ?>
    <?= Html::img(Yii::getAlias('@web') . '/uploads/thumb/'. $model->thumb, ['width' => '100px']) ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <?= Html::img(Yii::getAlias('@web') . '/uploads/'. $model->image, ['width' => '100px']) ?>

    <?= $form->field($model, 'description')->widget(Redactor::class,[
        'clientOptions' => [
            'minHeight' => 150,
        ],
    ]) ?>


    <?= $form->field($model, 'content')->widget(Redactor::class,[
            'clientOptions' => [
                    'minHeight' => 300,
            ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
