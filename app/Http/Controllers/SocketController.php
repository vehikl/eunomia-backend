<?php

namespace App\Http\Controllers;

use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Pusher\Pusher;

class SocketController extends Controller
{
    public function connect()
    {
        $broadcaster = new PusherBroadcaster(
            new Pusher('', '', '', '')
        );
    }
}
