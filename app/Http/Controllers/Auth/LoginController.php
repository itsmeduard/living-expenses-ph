<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Session;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard');

        } else {
            //invalid credentials
            return redirect()->route('login')->with('error', 'Invalid Credentials');
        }
    }

    public function log_out()
    {
        auth()->logout();
        Session::flush();
        return redirect()->route('login');
    }
}
