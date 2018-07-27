<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $userName = '';
        if($this->user) {
            $user = User::findOrFail($this->user);
            $userName = $user->name;
        }
        return ['body' => $this->body,
                'title' => $this->title,
                'date' => $this->date,
                'user' => $userName,
            ];
    }
}
