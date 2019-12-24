<?php

namespace app\lib;

use app\models\NiniCarousel;
use app\lib\NiniCarouselLibQuery;
use app\models\Tblimage;
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
class NiniCarouselLib extends NiniCarousel
{
    
    
    public function getOneImage()
    {
        return Tblimage::findOne(['id' => $this->imageid]);
    }


    public static function find()
    {
        return new NiniCarouselLibQuery(get_called_class());
    }
}
