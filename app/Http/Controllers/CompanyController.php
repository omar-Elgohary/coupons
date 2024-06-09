<?php
namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companies()
    {
        $companies = Company::get();
        return view('dashboard.companies', get_defined_vars());
    }

    public function showCompany($id)
    {
        $company = Company::find($id);
        return view('dashboard.showCompany', get_defined_vars());
    }

    public function addCompany()
    {
        return view('dashboard.createCompany');
    }

    public function storeCompany(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/images/'), $imageName);
        }

        $company = new Company();
        $company->name = json_encode(['ar' => $request->name_ar, 'en' => $request->name_en], JSON_UNESCAPED_UNICODE);
        $company->image = $imageName;
        $company->save();

        return redirect()->route('companies');
    }
}
