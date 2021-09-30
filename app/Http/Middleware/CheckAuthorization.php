<?php


namespace App\Http\Middleware;


use App\User;
use Illuminate\Http\Request;

class CheckAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        $arrayAction = explode("\\", $request->route()->getActionName());
        $action = strtolower(end($arrayAction));
        /**
         * @var User $user
         */
        $user = $request->user();

        if (!$user->hasPermission($action)) {
            abort(403);
        }

        return $next($request);
    }
}
