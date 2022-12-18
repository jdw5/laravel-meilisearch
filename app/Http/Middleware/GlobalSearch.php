<?php

namespace App\Http\Middleware;

use Closure;
use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Http\Request;

class GlobalSearch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ($query = $request->get('search')) {
            $results = Article::search($query)->get();

            Inertia::share([
                'search' => [
                    'results' => $results
                ]
            ]);
        }

        return $next($request);
    }
}
