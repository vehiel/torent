<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tr10her */

$this->title = Yii::t('app', 'Crear Herramienta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Herramientas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr10her-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
