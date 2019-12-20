<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TblGallery]].
 *
 * @see TblGallery
 */
class TblGalleryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TblGallery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TblGallery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
