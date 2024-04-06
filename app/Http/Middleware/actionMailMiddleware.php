<?php

namespace App\Http\Middleware;

use App\Mail\ActionMail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class actionMailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->check() && auth()->user()) {
            if ($request->getMethod() != 'GET') {

                $mailData = [
                    'user_id' => auth()->user()->id,
                    'user_name' => auth()->user()->name,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                    'request_data' => $request->all()
                ];

                Mail::to(auth()->user())->send(new ActionMail($mailData));
            }
        }
        return $next($request);
    }

}