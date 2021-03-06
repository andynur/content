<?php

/**
 * @author @DyanGalih
 * @copyright @2018
 */

namespace WebAppId\Content\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContentRequest
 * @package WebAppId\Content\Requests
 */
class ContentRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:191|unique:contents,title',
            'description' => 'required|string|max:191',
            'content' => 'required|string'
        ];
    }
    
    /**
     *  Custom error message.
     *
     * @return array
     */
    
    public function messages()
    {
        return [
            'title.required' => 'Content title required',
            'title.unique' => 'Content title should unique',
            'description.required' => 'Content description required',
            'content.required' => 'Content should required'
        ];
    }
    
}
