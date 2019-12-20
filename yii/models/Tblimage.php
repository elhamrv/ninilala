<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblimage".
 *
 * @property int $id
 * @property string $photocod
 * @property string $title
 * @property string $photopath
 * @property string $thumbnailpath
 * @property int $resulationw
 * @property int $resulationh
 * @property int $status
 * @property string $comments
 * @property string $created
 *
 * @property GalleryImages[] $galleryImages
 * @property TblGallery[] $galleries
 * @property NiniCarousel[] $niniCarousels
 */
class Tblimage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblimage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photocod', 'title', 'photopath', 'thumbnailpath'], 'required'],
            [['resulationw', 'resulationh', 'status'], 'integer'],
            [['comments'], 'string'],
            [['created'], 'safe'],
            [['photocod'], 'string', 'max' => 45],
            [['title'], 'string', 'max' => 200],
            [['photopath', 'thumbnailpath'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'photocod' => Yii::t('app', 'Photocod'),
            'title' => Yii::t('app', 'Title'),
            'photopath' => Yii::t('app', 'Photopath'),
            'thumbnailpath' => Yii::t('app', 'Thumbnailpath'),
            'resulationw' => Yii::t('app', 'Resulationw'),
            'resulationh' => Yii::t('app', 'Resulationh'),
            'status' => Yii::t('app', 'Status'),
            'comments' => Yii::t('app', 'Comments'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryImages()
    {
        return $this->hasMany(GalleryImages::className(), ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(TblGallery::className(), ['id' => 'gallery_id'])->viaTable('gallery_images', ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNiniCarousels()
    {
        return $this->hasMany(NiniCarousel::className(), ['imageid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TblimageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblimageQuery(get_called_class());
    }
}
