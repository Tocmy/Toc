<?php
namespace App\Http\Middleware\Role;



use App\Exceptions\Role\LevelDeniedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;


class VerifyLevel
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
    public function handle(Request $request, Closure $next, $level)
    {
        if ($this->auth->check() && $this->auth->user()->level() >= $level) {
            return $next($request);
        }

        throw new LevelDeniedException($level);

    }
}
