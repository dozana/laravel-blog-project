<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Closure;
use Illuminate\Http\Request;

class Admin extends Model
{
    use HasFactory;

    public function handle(Request $request, Closure $next)
    {
        if( !$request->session()->has('admin'))
        {
            return redirect()->route('ShowLogin');
        }

        return $next($request);
    }
}
