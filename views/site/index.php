<?php

/** @var yii\web\View $this */


use yii\helpers\Url;

$this->title = 'My Portfolio';
?>
<div class="row mt-5 vh-100">
    <div class="col-md-6 col-12 py-5 d-flex flex-column justify-content-center pad-l-10">
        <h1 class="font-monospace pb-3 header__title">PHP Backend Developer</h1>
        <p class="header__description">
            Hi, my name is Anna Kotelnikova and I'm a PHP Backend Developer based in Alicante , Spain. I have over 5 years of experience in the web development. I'm specialized in Laravel, Symfony, Yii Frameworks. You can check out my work below.
        </p>
        <small class="font-monospace mt-5 text-left scroll__down"><a href="#latest" class="text-black text-decoration-none"> Scroll Down ↓</a></small>
    </div>
    <div class="col-md-6 col-12 pe-0">
        <div class="d-flex header__right">
            <div class="w-50">
                <img src="/assets/my-photo.jpg" class="my__photo" alt="">
            </div>
            <div class="w-50"></div>
        </div>
    </div>
</div>

    <div class="row mt-5 pb-5 pt-5 pad-l-10 pad-r-10">
        <h2 class="font-monospace" id="latest">Latest work --</h2>
        <div class="container">
            <div class="row mt-5">
                <?php foreach ($works as $work):?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card work__card">
                        <?php if(!empty($work->thumb)):?>
                            <img src="<?=Yii::getAlias('@web') . '/uploads/thumb/'.$work->thumb ?>" class="card-img-top" alt="...">
                        <?php else:?>
                        <img src="<?=Yii::getAlias('@web') . '/images/no-photo.jpg'?>" class="card-img-top" alt="...">
                        <?php endif;?>
                        <div class="card-body">
                            <a class="text-dark text-decoration-none mt-3" href="<?= Url::to(['work/item', 'id' => $work->id])?>">
                                <h5 class="card-title font-monospace fs-5 mt-3"><?=$work->name ?></h5>
                            </a>
                            <hr>
                            <div class="card-text text-secondary mt-3"><?= $work->description ?></div>
                            <p class="card-text"><small class="text-warning"><?= $work->category->name ?></small></p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5 pt-5 pad-l-10 pad-r-10 contact__section">
        <h2 class="font-monospace pt-5">Contact me --</h2>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-6 col-12">
                    <div class="d-flex align-items-center">
                        <img class="me-5" src="<?= Yii::getAlias('@web').'/images/phone-icon.png'?>" width="40" alt="">
                        <a class="font-monospace text-decoration-none d-block" href="tel:+34635350307">+34 635 35 03 07</a>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="d-flex align-items-center">
                        <img class="me-5 ms-1" src="<?= Yii::getAlias('@web').'/images/whatsapp-icon.png'?>" width="35" alt="">
                        <a class="font-monospace text-decoration-none d-block" href="https://wa.me/79110285853">+7 911 028 58 53 (Whatsapp)</a>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="d-flex align-items-center">
                        <img class="me-5 ms-1" src="<?= Yii::getAlias('@web').'/images/email-icon.png'?>" width="35" alt="">
                        <a class="font-monospace text-decoration-none d-block" href="mailto:annakotelnikova4@gmail.com">annakotelnikova4@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>-->
