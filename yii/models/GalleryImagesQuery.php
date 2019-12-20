<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[GalleryImages]].
 *
 * @see GalleryImages
 */
class GalleryImagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GalleryImages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GalleryImages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
