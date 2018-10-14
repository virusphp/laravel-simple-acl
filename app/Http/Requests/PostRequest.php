<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'unique:posts|min:6',
            'body' => 'required|min:15',
            'image' => 'image|required|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Title Sudah Ada Silahkan Cari Title Lain',
            'title.min' => 'Minimal 6 Karakter',
            'body.min' => 'Minimal 15 Karakter',
            'body.required' => 'Isi Content Dilarang Kosong',
            'image.required' => 'File Gambar Dilarang Kosong',
            'image.image' => 'File Gambar Harus Ber Ekstensi PNG,JPG,JPEG',
        ];
    }
}
