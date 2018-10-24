<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CategoryDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('categories') == config('cms.default_category_id'));
    }
<<<<<<< HEAD

=======
>>>>>>> bfd43eaa597743262972d1fbd155e875147e48d3
    public function forbiddenResponse()
    {
        $notif = [
            'alert-type' => 'warning',
            'message' => 'Tidak di perbolehkan menghapus Kategori Default!!'
        ];
<<<<<<< HEAD

        return redirect()->back()->with($notif);
    }

=======
        return redirect()->back()->with($notif);
    }
>>>>>>> bfd43eaa597743262972d1fbd155e875147e48d3
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
<<<<<<< HEAD
}
=======
}
>>>>>>> bfd43eaa597743262972d1fbd155e875147e48d3
