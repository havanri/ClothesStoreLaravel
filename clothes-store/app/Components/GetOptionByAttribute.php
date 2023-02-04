<?php
namespace App\Components;

use App\Traits\CheckContains;

class GetOptionByAttribute{
    private $htmlOption='';
    private $data;
    use CheckContains;

    public function __construct($data)
    {
        $this->data=$data;
    }

    public function returnOption($taxonomyOfProduct){   
        if($taxonomyOfProduct!=null){
            foreach($this->data as $itemTaxonomy){
                $check = $this->findAllWithId($taxonomyOfProduct,$itemTaxonomy->id);
                if($check == true){
                    $this->htmlOption .="<option selected value=".$itemTaxonomy->id." >".$itemTaxonomy->name."</option>";
                }
                else{
                    $this->htmlOption .="<option value=".$itemTaxonomy->id." >".$itemTaxonomy->name."</option>";
                }
                
            }
        }
        else{
            foreach($this->data as $itemTaxonomy){               
                    $this->htmlOption .="<option value=".$itemTaxonomy->id." >".$itemTaxonomy->name."</option>";
            }
        }
        
        return $this->htmlOption;
    }
}