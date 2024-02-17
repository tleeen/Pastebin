<?php

namespace App\Http\Requests\Complaints;

use App\DTO\ComplaintDTO;
use App\DTO\Factories\ComplaintDTOFactory;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'body' => 'required|string',
            'id' => 'required|string',
        ];
    }

    /**
     * @return ComplaintDTO
     */
    public function getDto(): ComplaintDTO
    {
        return ComplaintDTOFactory::fromRequest($this);
    }
}
