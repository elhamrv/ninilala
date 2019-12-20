<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblproduct".
 *
 * @property int $id
 * @property int $type
 * @property string $productpath
 * @property string $productcode
 * @property string $title
 * @property string $productname
 * @property string $comment
 * @property int $quantity
 * @property string $status
 *
 * @property TblproductType $type0
 */
class Tblproduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'quantity'], 'integer'],
            [['productpath'], 'required'],
            [['comment'], 'string'],
            [['productpath'], 'string', 'max' => 400],
            [['productcode', 'title', 'status'], 'string', 'max' => 45],
            [['productname'], 'string', 'max' => 100],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => TblproductType::className(), 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'productpath' => Yii::t('app', 'Productpath'),
            'productcode' => Yii::t('app', 'Productcode'),
            'title' => Yii::t('app', 'Title'),
            'productname' => Yii::t('app', 'Productname'),
            'comment' => Yii::t('app', 'Comment'),
            'quantity' => Yii::t('app', 'Quantity'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(TblproductType::className(), ['id' => 'type']);
    }

    /**
     * {@inheritdoc}
     * @return TblproductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblproductQuery(get_called_class());
    }
}
