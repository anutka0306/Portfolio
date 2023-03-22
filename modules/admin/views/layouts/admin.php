<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Offcanvas;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
            <?php
            NavBar::begin([
                'brandLabel' => 'Admin Panel',
                'brandUrl' => '/admin',
                'options' => [
                    'class' => 'navbar-expand-md bg-success bg-gradient'
                ]
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav w-100 justify-content-end'],
                'items' => [
                        [
                                'label' => 'Categories',
                                'url' => ['/admin/category'],
                                'linkOptions' => [
                                    'class' => 'text-light font-monospace',
                                ]
                        ],
                        [
                                'label' => 'Works',
                                'url' => ['/admin/work'],
                                'linkOptions' => [
                                    'class' => 'text-light font-monospace',
                                ]
                        ],
                        [
                                'label' => 'Logout',
                                'url' => ['/site/logout'],
                                'linkOptions' => [
                                        'class' => 'text-light font-monospace',
                                        'data-method' => 'post'
                                ]
                        ],
                        [
                                'label' => 'Go to Site',
                                'url' => ['/site/index'],
                                'linkOptions' => [
                                    'class' => 'text-light font-monospace',
                                ]
                        ]
                ]
            ]);

            NavBar::end();
            ?>

</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container-fluid">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(
                    [
                            'links' => $this->params['breadcrumbs'],
                            'homeLink' => [
                                    'label' => 'Admin Panel',
                                    'url' => '/admin'
                            ],
                    ]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
