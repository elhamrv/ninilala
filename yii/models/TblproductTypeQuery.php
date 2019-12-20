<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TblproductType]].
 *
 * @see TblproductType
 */
class TblproductTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TblproductType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TblproductType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
