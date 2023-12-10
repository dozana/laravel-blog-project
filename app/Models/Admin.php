<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'password'];

    public static function store(Request $request)
    {
        $item = new Admin();

        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);

        return $item->save(); // true/false;
    }

    public static function updateItem($request, $item)
    {
        if ($request->password) {
            $update = $item->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        } else {
            $update = $item->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        return $update;
    }

    public function handle(Request $request, Closure $next)
    {
        if( !$request->session()->has('admin'))
        {
            return redirect()->route('ShowLogin');
        }

        return $next($request);
    }
}
