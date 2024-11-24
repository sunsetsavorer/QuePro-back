<?php

namespace App\Http\Middleware;

use App\Domains\Common\Exceptions\ServiceException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        return $request->expectsJson() 
					? null 
					: throw new ServiceException('Вы не авторизованы', 401);
    }
}
