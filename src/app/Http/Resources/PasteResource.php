<?php

namespace App\Http\Resources;

use App\Models\Paste;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Paste
 */
class PasteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hash_id,
            'title' => $this->title,
            'body' => $this->body,
            'type' => $this->type->title,
            'author' => ($this->author) ? $this->author->email : null,
            'access_modifier' => $this->access_modifier->title,
            'expiration_time' => $this->expiration_time->title,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
        ];
    }
}
