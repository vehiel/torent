<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tr09mar */

$this->title = Yii::t('app', 'Crear Marca');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marcas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr09mar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
