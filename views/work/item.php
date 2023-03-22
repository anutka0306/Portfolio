<?php
/** @var yii\web\View $this */

$this->title = 'Portfolio. Work: '.$work->name;
?>
<div class="container">
    <div class="row mt-5">
       <div class="col-sm-6 col-12 pt-5">
           <div class="mx-auto px-5">
               <h1 class="work__title font-monospace pb-3 text-dark"><?= $work->name ?></h1>
               <hr>
               <p class="font-monospace text-end text-black-50"><?= $work->category->name ?></p>
               <div class="work__description text-muted">
                    <?=$work->description?>
               </div>
               <a href="<?=$work->link?>" target="_blank" class="btn btn-outline-dark font-monospace mt-3">View Project →</a>
           </div>
       </div>
        <div class="col-sm-6 col-12 pt-5 d-flex justify-content-center align-items-start">
            <img class="work__image" src="<?= Yii::getAlias('@web/uploads/').$work->image?>">
        </div>
        <hr class="work__divider my-5">
    </div>
    <div class="row pt-5 pb-5">
        <div class="work__content text-muted px-5">
            <?=$work->content?>
        </div>
    </div>
</div>
