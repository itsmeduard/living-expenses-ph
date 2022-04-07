<?php
namespace App\Http\Controllers;
use Session;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->check() == null){
            auth()->logout();
            Session::flush();
            return redirect()->route('login');

        /*Login to User Panel*/
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function log_out()
    {
        auth()->logout();
        Session::flush();
        return redirect()->route('login');
    }
}
