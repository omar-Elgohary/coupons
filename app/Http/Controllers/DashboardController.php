<?php
namespace App\Http\Controllers;
use App\Models\Coupon;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.home');
    }

    public function showAdminCoupon($company_id)
    {
        $company = Company::where('id', $company_id)->first();
        $coupon = Coupon::where('company_id', $company_id)->where('status', 1)->first(); 
        if ($company === null) {
            return view('home');
        }else{
            return view('dashboard.homeCoupon', compact('company', 'coupon'));
        }
    }

    public function loginPage()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'password' => 'required',
        ]);

    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard');
    }
    return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginPage');
    }
}
