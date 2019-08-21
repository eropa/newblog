<?php

namespace App\Service;

use App\Model\Optionsait;

class OptionService{

    public function GetValue($name){
        $data=Optionsait::where('name', $name)->first();
        return $data->value;
    }
}