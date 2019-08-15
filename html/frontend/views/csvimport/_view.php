<?php 

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="news-item">
    <?= HtmlPurifier::process($model->uid) ?> 
        <?= HtmlPurifier::process($model->first_name) ?>   
        <?= HtmlPurifier::process($model->last_name) ?> 
        <?= HtmlPurifier::process($model->description) ?>
</div>