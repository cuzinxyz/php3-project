<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        // get function method.
        $currentAction = $this->route()->getActionMethod();

        switch ($this->method()) :
            case 'POST':
                switch ($currentAction) :
                    case 'store':
                        $rules = [
                            'title' => 'required',
                            'description' => 'required',
                            'property_type_id' => 'required',
                            'area' => 'required',
                            'price' => 'required',
                            'beds' => 'required',
                            'baths' => 'required',
                            'address' => 'required',
                            'phone_number' => 'required',
                            'email' => 'required',
                            'images' => 'required',
                        ];
                        break;

                    case 'update':
                        $rules = [
                            'title' => 'required',
                            'description' => 'required',
                            'property_type_id' => 'required',
                            'area' => 'required',
                            'price' => 'required',
                            'beds' => 'required',
                            'baths' => 'required',
                            'address' => 'required',
                            'phone_number' => 'required',
                            'email' => 'required',
                        ];
                        break;
                    endswitch;
            endswitch;

        return $rules;
    }
}
