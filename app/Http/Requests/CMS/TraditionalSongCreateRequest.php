<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class TraditionalSongCreateRequest extends FormRequest
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
            'title_en' => 'required',
            'title_si' => 'required',
            'title_ta' => 'required',
            'writer_en' => 'required',
            'writer_si' => 'required',
            'writer_ta' => 'required',
            'video_thumbnail' => 'nullable|image',
            'video' => 'required|url',
        ];
    }
}
