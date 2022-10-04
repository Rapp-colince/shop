<?php

namespace App\Events;

use App\Models\City;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderShipped
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var City
     */
    public City $city;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(City $city) {
        file_put_contents(app()->basePath() . '/.Event.' . date('H-i-s') , '');
        $this->city = $city;
        $city = new City();
        $city->name = date('Y-m-d H:i:s');
        $city->save();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
