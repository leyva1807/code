<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Page;
use App\Constants\Status;
use Illuminate\Http\Request;


class ActiveTemplateMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        $viewShare['activeTemplate']     = activeTemplate();
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        view()->share($viewShare);

        view()->composer([$viewShare['activeTemplate'] . 'partials.header', $viewShare['activeTemplate'] . 'partials.footer'], function ($view) {
            $view->with([
                'pages' => Page::where('is_default', Status::NO)->where('tempname', activeTemplate())->orderBy('id', 'DESC')->get()
            ]);
        });

        return $next($request);
    }
}
