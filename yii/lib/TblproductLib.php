<?php

namespace app\lib;

use Yii;
use app\models\ProductImages;
use app\models\Tblimage;
use app\models\Tblproduct;

/**
 * This is the model class for table "tblproduct".
 *
 * @property int $id
 * @property int $type
 * @property string $productcode
 * @property string $title
 * @property string $productname
 * @property string $comment
 * @property int $quantity
 * @property string $status
 *
 * @property ProductImages[] $productImages
 * @property Tblimage[] $images
 * @property TblproductType $type0
 */
class TblproductLib extends Tblproduct
{
    
    
    public function getDefaultImage()
    {
        $item = ProductImages::findOne(['product_id' => $this->id , 'isdefault' => 1]);
        
        if($item){
            
            return Tblimage::findOne(['id' => $item->image_id]);
        }
        return false;
    }
    
    public static function find()
    {
        return new TblproductLibQuery(get_called_class());
    }
}
