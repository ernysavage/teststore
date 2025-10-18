<?php
namespace App\Http\Requests\ProductCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoryId = $this->route('category')?->id;

        return [
            'title' => 'sometimes|required|string|max:255',
            'slug' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('product_categories')->ignore($categoryId)],
            'parent_id' => 'nullable|exists:product_categories,id',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge($this->json()->all());
    }
}
