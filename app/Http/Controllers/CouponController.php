<?php
namespace App\Http\Controllers;
use ApiipClient\Apiip;
use App\Models\Coupon;
use App\Models\Company;
use App\Models\Country;
use ipinfo\ipinfo\IPinfo;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class CouponController extends Controller
{
    public function coupon(Request $request, $id)
    {
        $company = Company::find($id);
        $accessToken = '4285adcb6acab1';
        $client = new Ipinfo($accessToken);
        $ip = $request->ip();
        // $ip = '102.47.15.16'; 
        // $ip = '2.59.54.0'; 

        $details = $client->getDetails($ip);
        $MyCountry = Country::where('code', $details->country)->first();

        if($MyCountry){
            $coupon = Coupon::where('company_id', $id)->where('status', 1)->where('country_id', $MyCountry->id)->first();
            if ($coupon) {
                return view('dashboard.homeCoupon', compact('coupon'));
            }
        }
        return view('home');
    }

    public function coupons()
    {
        $coupons = Coupon::get();
        return view('dashboard.coupons', compact('coupons'));
    }

    public function addCoupon()
    {
        return view('dashboard.createCoupon');
    }

    public function storeCoupon(Request $request)
    {
        $coupon = new Coupon();
        $coupon->company_id = $request->company_id;
        $coupon->country_id = $request->country_id;
        $coupon->coupon = $request->coupon;
        $coupon->status = $request->status;
        $coupon->title = $request->title;
        $coupon->description = $request->description;
        $coupon->save();

        return redirect()->route('coupons');
    }

    public function showCoupon($id)
    {
        $coupon = Coupon::find($id);
        return view('dashboard.showCoupon', get_defined_vars());
    }

    public function updateCoupon(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $coupon->update([
            'coupon' => $request->coupon,
            'status' => $request->status,
            'company_id' => $request->company_id,
            'country_id' => $request->country_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('coupons');
    }

    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return back();
    }

    public function changeStatus($id)
    {
        $coupon = Coupon::find($id);
        $coupon->status = !$coupon->status;
        $coupon->save();
        return back();
    }
}
