<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        // Melakukan pengecekan secara manual apakah yang login merupakan admin atau bukan
        // Jika yang membuka view adalah guest ATAU yang mengakses bukan didaen
        // Bisa pake auth()->check() yang jika sudah login menghasilkan TRUE, sehingga pengondisiannya menjadi !user()->check()
        if(auth()->guest() || auth()->user()->username !== 'didaen') {

            // Gagalkan sambil tampilkan pesan 403 Forbidden
            abort(403);
        }

        // Lakukan perintah selanjutnya
        return $next($request);
    }
}
