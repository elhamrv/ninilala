<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Dings]].
 *
 * @see Dings
 */
class DingsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Dings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Dings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
