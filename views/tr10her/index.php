<?php

use app\models\Tr09mar;
use app\models\Tr08nhr;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Tr10herSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Herramientas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr10her-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Herramienta'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'chr_10in',

            [
              'attribute'=>'idn_08in',
              'value'=> function($model){
                $nombre = Tr08nhr::findOne($model->idn_08in);
                if(@$nombre){
                  return $nombre->nom_08vc;
                }else{
                  return "No Definido";
                }
              }
            ],
            [
              'attribute'=>'cgm_09in',
              'value'=> function($model){
                $marca = Tr09mar::findOne($model->cgm_09in);
                if(@$marca){
                  return $marca->nom_09vc;
                }else{
                  return "No Definido";
                }
              }
            ],
            [
              'attribute'=>'vol_10in',
              'value'=> function($model){
                if ($model->vol_10in == 1){
                  return "110";
                }elseif ($model->vol_10in == 2) {
                  return "220";
                }else{
                  return "No aplica";
                }
              }
            ],
            'des_10vc',
            [
              'attribute'=>'est_10in',
              'filter'=>Html::activeDropDownList($searchModel, 'est_10in',
              ['1'=>'Activo','0'=>'Inactivo'],['class' => 'form-control','prompt' => 'Todos']),
              'value'=>  function($model){
                if($model->est_10in == 1){
                  return "Activo";
                }else{
                  return "Inactivo";
                }
              }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
