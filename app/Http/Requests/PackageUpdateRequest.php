<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:packages,name,'. $this->package->id,
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'featured_event' => 'nullable|string',
            'language' => 'nullable|string',
            'foods' => 'nullable|string',
            'departure_date' => 'required|date',
            'duration' => 'required|string|max:255',
            'type' => 'nullable|string',
            'price' => 'required|integer'
        ];
    }
}
