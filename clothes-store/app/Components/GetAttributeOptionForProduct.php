<?php

namespace App\Components;

use App\Traits\CheckContains;

class GetAttributeOptionForProduct{
    private $htmlOption='';
    private $attributes;
    private $attributeOfProduct;
    use CheckContains;

    public function __construct($attributeOfProduct,$attributes)
    {
        $this->attributeOfProduct=$attributeOfProduct;
        $this->attributes=$attributes;
    }
    public function returnOption(){
        foreach($this->attributes as $attributeItem){
            $check = $this->findAllWithId($this->attributeOfProduct,$attributeItem->id);
            if($check==true){
                $this->htmlOption .= "<option disabled value=" .$attributeItem->id." >".$attributeItem->name."</option>";
            }
            else{
                $this->htmlOption .= "<option value=" .$attributeItem->id." >".$attributeItem->name."</option>";
            }
        }
        return $this->htmlOption;
    }

}