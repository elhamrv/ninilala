<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_images".
 *
 * @property int $product_id
 * @property int $image_id
 * @property int $positon
 * @property string $isdefault
 *
 * @property Tblimage $image
 * @property Tblproduct $product
 */
class ProductImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'image_id'], 'required'],
            [['product_id', 'image_id', 'positon'], 'integer'],
            [['isdefault'], 'string', 'max' => 45],
            [['product_id', 'image_id'], 'unique', 'targetAttribute' => ['product_id', 'image_id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblimage::className(), 'targetAttribute' => ['image_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblproduct::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'image_id' => Yii::t('app', 'Image ID'),
            'positon' => Yii::t('app', 'Positon'),
            'isdefault' => Yii::t('app', 'Isdefault'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Tblimage::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Tblproduct::className(), ['id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductImagesQuery(get_called_class());
    }
}
