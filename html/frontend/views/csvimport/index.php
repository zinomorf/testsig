<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;


?>

<div class="site-contact">
    <p>
       Import CSV file to DB.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                'id' => 'import-form'
                ]); ?>
                <?= $form->field($modeUploadForm, 'file')->fileInput(); ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    
    <?php 
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
        ]);
    ?>

</div>
