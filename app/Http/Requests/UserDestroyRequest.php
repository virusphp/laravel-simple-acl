<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('user') == config('cms.default_user_id') || 
                    $this->route('user') == Auth::user()->id);
    }

    public function forbiddenResponse()
    {
        $notif = [
            'alert-type' => 'warning',
            'message' => 'Tidak di perbolehkan menghapus User Default!!'
        ];

        return redirect()->back()->with($notif);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
