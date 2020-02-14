<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqFormPost extends FormRequest
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
          'faq_qsn'=>'required',
          'faq_ans'=>'required',
        ];
    }

    public function messages()
    {
        return [
          'faq_qsn.required'=>'Question Koi??',
          // 'faq_ans.required'=>'Answer Koi??',
        ];
    }
}
