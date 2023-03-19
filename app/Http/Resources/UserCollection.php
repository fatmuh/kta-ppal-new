<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->active == 1) {
            $color = 'text-success';
        }elseif ($this->active == 0) {
            $color = 'text-red-500';
        }else{
            $color = 'text-danger';
        }

        if ($this->active == 1) {
            $active = 'ACTIVE';
        }elseif ($this->active == 0) {
            $active = 'NON ACTIVE';
        }else{
            $active = 'BANNED';
        }

        return [
            'id'  => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'color' => $color,
            'active'=> $active,
            'detail_url' => route('users.detail', $this->id),
            'delete_url' => route('users.delete', $this->id),
        ];
    }
}
