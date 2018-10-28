<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'content' => 'required|min:6',
            'image' => 'image|required|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'content.min' => 'Minimal 6 Karakter',
            'content.required' => 'Isi Content Dilarang Kosong',
            'image.required' => 'File Gambar Dilarang Kosong',
            'image.image' => 'File Gambar Harus Ber Ekstensi PNG,JPG,JPEG',
        ];
    }
}
