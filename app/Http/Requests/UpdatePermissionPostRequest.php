<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePermissionPostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('permission');
        return [
            'title'=>'required|min:3|max:10',
            'slug'=>"required|unique:permissions,slug,$id|min:3|max:10",
        ];
    }
}
