<?php
namespace App\Components;

use App\Models\TaxonomyAttribute;
use App\Traits\CheckContains;

class GetTaxonomyOptionForProduct{
    private $htmlOption='';
    private $attributeOfProduct;
    private $taxonomyOfProduct;
    use CheckContains;

    public function __construct($attributeOfProduct,$taxonomyOfProduct)
    {
        $this->attributeOfProduct=$attributeOfProduct;
        $this->taxonomyOfProduct=$taxonomyOfProduct;
    }
    public function returnOption(){
        foreach($this->attributeOfProduct as $attributeItem){
            $go = new GetOptionByAttribute(TaxonomyAttribute::where("attribute_id",$attributeItem->id)->get());
            $optionTaxonomies=$go->returnOption($this->taxonomyOfProduct);

            $this->htmlOption.="<div class='species'><label>Tên:" .$attributeItem->name. "</label><br/><label> Giá trị(s):</label ><div class='select2-purple' ><select name='attribute_values[]' class='js-species-select' multiple='multiple' data-placeholder='Chọn tên chủng loại' data-dropdown-css-class='select2-purple' style='width: 100%;'>".$optionTaxonomies."</select></div></div> ";
        }
        return $this->htmlOption;
    }
}