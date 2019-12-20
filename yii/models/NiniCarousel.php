<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nini_carousel".
 *
 * @property int $id
 * @property string $title
 * @property int $imageid
 * @property string $comment
 * @property string $url
 * @property string $status
 * @property double $priority
 *
 * @property Tblimage $image
 */
class NiniCarousel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nini_carousel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageid'], 'integer'],
            [['priority'], 'number'],
            [['title', 'status'], 'string', 'max' => 45],
            [['comment'], 'string', 'max' => 300],
            [['url'], 'string', 'max' => 100],
            [['imageid'], 'exist', 'skipOnError' => true, 'targetClass' => Tblimage::className(), 'targetAttribute' => ['imageid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'imageid' => Yii::t('app', 'Imageid'),
            'comment' => Yii::t('app', 'Comment'),
            'url' => Yii::t('app', 'Url'),
            'status' => Yii::t('app', 'Status'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Tblimage::className(), ['id' => 'imageid']);
    }
    
    public function getOneImage()
    {
        return Tblimage::findOne(['id' => $this->imageid]);
    }

/**
     * {@inheritdoc}
     * @return NiniCarouselQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NiniCarouselQuery(get_called_class());
    }
}
