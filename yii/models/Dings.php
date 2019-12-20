<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dings".
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string $quantity
 * @property string $url
 */
class Dings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'quantity'], 'string', 'max' => 45],
            [['url'], 'string', 'max' => 300],
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
            'status' => Yii::t('app', 'Status'),
            'quantity' => Yii::t('app', 'Quantity'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DingsQuery(get_called_class());
    }
}
