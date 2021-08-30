<?php
namespace App\Http\Middleware\Role;



use App\Exceptions\Role\PermissionDeniedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class VerifyPermission
{

    protected $auth;
    public function __construct(Guard $auth)
    {
          $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if ($this->auth->check() && $this->auth->user()->hasPermission($permission)) {
            return $next($request);
        }

        throw new PermissionDeniedException($permission);

    }
}
