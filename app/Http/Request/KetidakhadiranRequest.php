<?php
   
namespace App\Http\Request;
  
use Illuminate\Foundation\Http\FormRequest;
  
class KetidakhadiranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array|string>
     */
    public function rules(): array
    {
        return [
            'tglawal' => 'required',
            'tglakhir' => 'required',
            'media' => 'required',
        ];
    }
}