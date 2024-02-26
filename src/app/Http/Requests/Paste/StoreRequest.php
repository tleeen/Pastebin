<?php

namespace App\Http\Requests\Paste;

use App\DTO\Factories\PasteDTOFactory;
use App\DTO\PasteDTO;
use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'typeId' => 'required|integer',
            'accessModifierId' => 'required|integer',
            'expirationTimeId' => 'required|integer',
        ];
    }

    /**
     * @return PasteDTO
     */
    public function getDto(): PasteDTO
    {
        return PasteDTOFactory::fromRequest($this);
    }
}
