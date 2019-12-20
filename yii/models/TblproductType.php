<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblproduct_type".
 *
 * @property int $id
 * @property string $product_name
 * @property int $product_type
 *
 * @property Tblproduct[] $tblproducts
 */
class TblproductType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblproduct_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_name', 'product_type'], 'required'],
            [['id', 'product_type'], 'integer'],
            [['product_name'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_type' => Yii::t('app', 'Product Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblproducts()
    {
        return $this->hasMany(Tblproduct::className(), ['type' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TblproductTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblproductTypeQuery(get_called_class());
    }
}
