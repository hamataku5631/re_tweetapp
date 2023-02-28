<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return redirect()->route('tweet.index');
    }
    protected function loggedOut(\Illuminate\Http\Request $request)
    {   
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/login');
    
        
    }

}
