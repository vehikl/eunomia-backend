<?php

namespace App\Http\Controllers;

use App\Events\WebsocketFire;
use BeyondCode\LaravelWebSockets\Apps\AppProvider;
use BeyondCode\LaravelWebSockets\Dashboard\DashboardLogger;
use Exception;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Pusher\Pusher;

class SocketController extends Controller
{
    public function connect(Request $request)
    {

        try {
            $broadcaster = new PusherBroadcaster(
                new Pusher(env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    []));
        } catch (Exception $e) {
            dd($e);
        }

        return $broadcaster->validAuthenticationResponse($request, []);
    }

    public function data(AppProvider $appProvider)
    {
        return [
            "port" => env('PUSHER_PORT'),
            "host" => env('PUSHER_HOST'),
            "authEndpoint" => "api/sockets/connect",
            "logChannel" => DashboardLogger::LOG_CHANNEL_PREFIX,
            "apps" => $appProvider->all()
        ];
    }

    public function fireEvent()
    {
        WebsocketFire::dispatch();
        WebsocketFire::broadcast();
    }
}
