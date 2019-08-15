<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;

?>

<div class="site-contact">

    <p>
       the result of importing the file.
    </p>

    <div class="row">
        <div class="col-lg-5">
            Count insert: <?= $resultImport['insert']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            Count update: <?= $resultImport['update']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            Count delete: <?= $resultImport['delete']; ?>
        </div>
    </div>    
</div>

<br><br>
<?php 
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ]);
?>
