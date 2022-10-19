<?php
namespace App\Http\Controllers;
 
use App\Models\User;//new
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;//new
use Illuminate\Support\Facades\Hash;//new
use Illuminate\Support\Facades\Session;//new
 
class CustomAuthController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  
       
 
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember=$request->remember;
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        // dd($credentials); [ "email" => "a@gmail.com", "password" => "123456"]
        if (Auth::attempt($credentials)) {
            return redirect("dashboard")->withSuccess('Signed in');
        }
   
        return redirect("login")->withSuccess('Login details are not valid');
    }
 
 
 
    public function registration()
    {
        return view('registration');
    }
       
 
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data)->only('email', 'password');// withou only cant work 

        // dd($check);
          return CustomAuthController::customLogin($request);
        // return redirect("dashboard")->withSuccess('have signed-in');
    }
 
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
     
 
    public function dashboard()
    {
        if(Auth::check()){
            if (! Gate::allows('admin')) {//denies
                abort(403);
            }
            return view('dashboard');
        }
   
        return redirect("login")->withSuccess('are not allowed to access');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}