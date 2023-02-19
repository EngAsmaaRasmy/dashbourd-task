<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name"=>"required|unique:categories,name,".$this->id,
            "name_ar"=>"required",
            "description"=>"required",
            "description_ar"=>"required",
        ];
    }
}
