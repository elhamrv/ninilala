<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_gallery".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property double $price
 * @property string $description
 *
 * @property GalleryImages[] $galleryImages
 * @property Tblimage[] $images
 */
class TblGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
            'price' => Yii::t('app', 'Price'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryImages()
    {
        return $this->hasMany(GalleryImages::className(), ['gallery_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Tblimage::className(), ['id' => 'image_id'])->viaTable('gallery_images', ['gallery_id' => 'id']);
    }

    public function getImagesModel()
    {
        return $this->getImages()->all();
    }
    
    /**
     * {@inheritdoc}
     * @return TblGalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblGalleryQuery(get_called_class());
    }
}
