<?php
namespace App\Http\Requests\ProductCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:product_categories,id',
            'slug' => 'required|string|max:255|unique:product_categories,slug',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge($this->json()->all());
    }
}