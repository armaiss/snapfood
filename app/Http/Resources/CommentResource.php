<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $createdAt = Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
        $updatedAt = Carbon::parse($this->updated_at)->format('Y-m-d H:i:s');

        return [
            'author' => [
                'name' => $this->cart->user->name,
            ],
            'foods' => $this->cart->foods->map(function ($food) {
                return $food->name;
            }),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
            'score' => $this->score,
            'content' => $this->content,
        ];
    }

}
