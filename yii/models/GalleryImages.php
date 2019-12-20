<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_images".
 *
 * @property int $gallery_id
 * @property int $image_id
 * @property int $position
 * @property int $isdefault
 *
 * @property TblGallery $gallery
 * @property Tblimage $image
 */
class GalleryImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gallery_id', 'image_id'], 'required'],
            [['gallery_id', 'image_id', 'position', 'isdefault'], 'integer'],
            [['gallery_id', 'image_id'], 'unique', 'targetAttribute' => ['gallery_id', 'image_id']],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblGallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblimage::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gallery_id' => Yii::t('app', 'Gallery ID'),
            'image_id' => Yii::t('app', 'Image ID'),
            'position' => Yii::t('app', 'Position'),
            'isdefault' => Yii::t('app', 'Isdefault'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(TblGallery::className(), ['id' => 'gallery_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Tblimage::className(), ['id' => 'image_id']);
    }

    /**
     * {@inheritdoc}
     * @return GalleryImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryImagesQuery(get_called_class());
    }
}
