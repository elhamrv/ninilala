<?php

namespace app\lib;

/**
 * This is the ActiveQuery class for [[NiniCarousel]].
 *
 * @see NiniCarousel
 */
class NiniCarouselLibQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NiniCarouselLib[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NiniCarouselLib|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
