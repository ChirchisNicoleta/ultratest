<?php

namespace Laravel\Nova\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $email
 */
class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getKey(),
            'component' => data_get($this->data, 'component'),
            'message' => data_get($this->data, 'message'),
            'actionText' => data_get($this->data, 'actionText'),
            'actionUrl' => data_get($this->data, 'actionUrl'),
            'icon' => data_get($this->data, 'icon'),
            'type' => data_get($this->data, 'type'),
            'iconClass' => data_get($this->data, 'iconClass'),
            'created_at_friendly' => $this->created_at->diffForHumans(),
            'created_at' => $this->created_at->toIso8601String(),
            'read_at' => $this->read_at,
        ];
    }
}
