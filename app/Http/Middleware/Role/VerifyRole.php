<?php
namespace App\Http\Middleware\Role;



use App\Exceptions\Role\RoleDeniedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class VerifyRole
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
    public function handle(Request $request, Closure $next, $role)
    {
        $role = explode('|', $role);
        for($i = 0; $i < count($roles); $i++){
            if ($this->auth->check() && $this->auth->user()->hasRole($role[$i])) {
                return $next($request);
        }

        throw new RoleDeniedException($role);

    }
}
