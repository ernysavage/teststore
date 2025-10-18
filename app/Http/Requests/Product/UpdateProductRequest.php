<?php
namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id;

        return [
            'title' => 'sometimes|required|string|max:255',
            'slug' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('product_categories')->ignore($productId)],
            'description' => 'nullable|string',
            'category_id' => 'sometimes|required|exists:product_categories,id',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge($this->json()->all());
    }
}