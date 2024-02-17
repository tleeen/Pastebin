<?php

namespace App\Http\Requests\Paste;

use App\DTO\Factories\PasteDTOFactory;
use App\DTO\PasteDTO;
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
            'title' => 'required|string',
            'body' => 'required|string',
            'typeId' => 'required',
            'accessModifierId' => 'required',
            'expirationTimeId' => 'required',
        ];
    }

    public function getDto(): PasteDTO
    {
        return PasteDTOFactory::fromRequest($this);
    }
}
