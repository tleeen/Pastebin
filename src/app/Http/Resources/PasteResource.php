<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'title' => $this->title,
            'body' => $this->body,
//            'type' => $this->type->title,
//            'author' => $this->author->email,
//            'access_modifier' => $this->access_modifier->title,
//            'expiration_time' => $this->expiration_time->title,
//            'created_at' => Carbon::parse(Carbon::parse($this->created_at)->format('d:m:Y'))->toDateString(),
        ];
    }
}
