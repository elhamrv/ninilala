<?php

namespace app\lib;

use app\models\GalleryImages;
use app\models\TblGallery;
use app\models\Tblimage;
use Yii;

/**
 * This is the model class for table "tbl_gallery".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property double $price
 * @property string $description
 *
 * @property GalleryImages[] $galleryImages
 * @property Tblimage[] $images
 */
class TblGalleryLib extends TblGallery
{
    
    public function getDefaultImage()
    {
        $item = GalleryImages::findOne(['gallery_id' => $this->id , 'isdefault' => 1]);
        
        if($item){
            
            return Tblimage::findOne(['id' => $item->image_id]);
        }
        return false;
    }

    
   
    public static function find()
    {
        return new TblGalleryLibQuery(get_called_class());
    }
}
