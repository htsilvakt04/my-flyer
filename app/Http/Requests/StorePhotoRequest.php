<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\FLyer;
class StorePhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Flyer::where([
          "zip" => $this->zip,
          "street" => $this->street,
          "user_id" => $this->user()->id,
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          "photos" => "mimes:png,jpeg,jpg"
        ];
    }
}
