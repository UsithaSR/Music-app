<?php

namespace App\Http\Middleware;

use App\Helpers\APIHelper;
use App\Setting;
use Closure;
use Illuminate\Support\Str;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class CommonHeaders
{
    public function __construct()
    {
        //
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $client_name = $request->header('X-OAuth-Client-Name');
        $secret = $request->header('X-OAuth-Client-Secret');
        $version = $request->header('X-OAuth-Client-Version');
        $language = $request->header('Accept-Language');

        $client_validate = $this->checkClientSecret($client_name, $secret, $version, $language);

        if ($client_validate) {
            $response = $next($request);

            if (auth()->user() != null) {
                $email = auth()->user()->email;
            } else {
                $email = request()->input('email');
            }

            $this->setAPILog("EMAIL : | " . $email . " | URL : " . (string)$request->getUri() . " | Request body : " . (string)json_encode($request->input()) . " | Response code : " . $response->getStatusCode() . " | Response body : " . (string)$response->getContent());

            return $response;
        } else {
            return APIHelper::makeAPIResponse(false, "Invalid Headers", null, 400);
        }
    }

    public function checkClientSecret($client_name, $secret, $version, $language)
    {
        $auth_clients = Setting::where('title', 'oauth_clients')->pluck('text')->first();
        $all_clients = collect(json_decode($auth_clients, true));
        $auth_client = $all_clients->where("name", $client_name)->where("secret", $secret)->where("version", $version)->first();
        $valid_language = in_array($language, ["en", "si", "ta"]);
        if ($auth_client != null && $valid_language) {
            return true;
        }
        return false;
    }

    public static function setAPILog($log_text)
    {
        $logFile = date("Y-m-d") . '.log';
        $log = [Str::limit($log_text, 2000, "...")];
        $orderLog = new Logger("API");
        $orderLog->pushHandler(new StreamHandler(storage_path('logs/service/' . $logFile)), Logger::INFO);
        $orderLog->info('Log', $log);
    }
}
