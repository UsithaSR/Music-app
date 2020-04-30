<?php

namespace App\Http\Middleware;

use App\Helpers\APIHelper;
use App\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTAuthenticate extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {

            $this->authenticate($request);

            if(auth()->user()->status!=1){
                return APIHelper::makeAPIResponse(false, "User not active", null, 400);
            } else {
                return $next($request);
            }
        } catch (TokenExpiredException $e) {
            return APIHelper::makeAPIResponse(false, "Token Expired", null, 401);
        } catch (TokenInvalidException $e) {
            APIHelper::specialRequestLog("Request Token Invalid | ERROR => " . $e->getMessage(), $request);
            return APIHelper::makeAPIResponse(false, "Invalid Token", null, 401);
        } catch (UnauthorizedHttpException $e) {
            APIHelper::specialRequestLog("Request JWTException | ERROR => " . $e->getMessage(), $request);
            return APIHelper::makeAPIResponse(false, $e->getMessage(), null, 400);
        } catch (JWTException $e) {
            APIHelper::specialRequestLog("Request JWTException | ERROR => " . $e->getMessage(), $request);
            return APIHelper::makeAPIResponse(false, "Token Exception", null, 400);
        } catch (\Exception $e) {
            report($e);
            APIHelper::specialRequestLog("Request JWTException | ERROR => " . $e->getMessage(), $request);
            return APIHelper::makeAPIResponse(false, "Token Exception", null, 400);
        }
    }
}
