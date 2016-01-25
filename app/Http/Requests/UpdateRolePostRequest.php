<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateRolePostRequest extends Request
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
        $id = $this->route('role');
        return [
            'title'=>'required|min:3|max:10',
            'slug'=>"required|unique:roles,slug,$id|min:3|max:10",
        ];
    }
}
