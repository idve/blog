<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title'=>'required',
            'content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'标题不能为空',
            'content.required'=>'内容不能为空',
        ];
    }

    public function postFilleData()
    {
        $published_at=new Carbon(
            $this->publish_date.''.$this->publish_time
        );
        return [
            'title'=>$this->title,
            'content'=>$this->content,

        ];

        
     }

}
