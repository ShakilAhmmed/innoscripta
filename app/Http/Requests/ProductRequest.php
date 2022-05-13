<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'sku' => [
                'required',
                'alpha_num',
                Rule::unique('products', 'sku')
                    ->where('deleted_at', null)
                    ->ignore($this->route('product'))
            ],
            'price' => ['required'],
            'category_id' => ['required']
        ];
    }
}
