<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr10her".
 *
 * @property int $chr_10in Código de herramienta
 * @property int $idn_08in Id nombre herramienta
 * @property int $cgm_09in Código de marca
 * @property int $vol_10in Voltaje
 * @property string $des_10vc Descripcion
 * @property int $vut_10in Vida util años
 * @property int $gar_10in Garantía en meses
 * @property int $tip_10in Tipo
 * @property int $est_10in Estado de la herramienta
 * @property int $alq_10in Alquilada
 * @property string $ser_10vc Serial
 *
 * @property Tr09mar $cgm09in
 * @property Tr08nhr $n08in
 * @property Tr11alq[] $tr11alqs
 */
class Tr10her extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tr10her';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idn_08in', 'cgm_09in', 'vol_10in', 'des_10vc', 'vut_10in', 'gar_10in', 'tip_10in', 'est_10in', 'alq_10in'], 'required'],
            [['idn_08in', 'cgm_09in', 'vol_10in', 'vut_10in', 'gar_10in', 'tip_10in', 'est_10in', 'alq_10in'], 'integer'],
            [['des_10vc'], 'string', 'max' => 100],
            [['ser_10vc'], 'string', 'max' => 50],
            [['cgm_09in'], 'exist', 'skipOnError' => true, 'targetClass' => Tr09mar::className(), 'targetAttribute' => ['cgm_09in' => 'cgm_09in']],
            [['idn_08in'], 'exist', 'skipOnError' => true, 'targetClass' => Tr08nhr::className(), 'targetAttribute' => ['idn_08in' => 'idn_08in']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'chr_10in' => Yii::t('app', 'Código de herramienta'),
            'idn_08in' => Yii::t('app', 'Nombre herramienta'),
            'cgm_09in' => Yii::t('app', 'Marca'),
            'vol_10in' => Yii::t('app', 'Voltaje'),
            'des_10vc' => Yii::t('app', 'Descripcion'),
            'vut_10in' => Yii::t('app', 'Años vida util'),
            'gar_10in' => Yii::t('app', 'Meses de Garantía'),
            'tip_10in' => Yii::t('app', 'Tipo'),
            'est_10in' => Yii::t('app', 'Estado de la herramienta'),
            'alq_10in' => Yii::t('app', 'Alquilada'),
            'ser_10vc' => Yii::t('app', 'Serial'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCgm09in()
    {
        return $this->hasOne(Tr09mar::className(), ['cgm_09in' => 'cgm_09in']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getN08in()
    {
        return $this->hasOne(Tr08nhr::className(), ['idn_08in' => 'idn_08in']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTr11alqs()
    {
        return $this->hasMany(Tr11alq::className(), ['chr_10in' => 'chr_10in']);
    }

    public function getNombreHerramienta()
    {
      return Tr08nhr::find()
      ->orderBy('idn_08in ASC')
      ->all();
    }
    public function getMarcas()
    {
      return Tr09mar::find()
      ->orderBy('cgm_09in ASC')
      ->all();
    }
}
