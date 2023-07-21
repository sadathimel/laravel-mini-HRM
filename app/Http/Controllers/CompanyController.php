<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Company;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $companies = Company::paginate(15);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('companies')->ignore($request->id)],
            'logo' =>  ['required', 'mimes:jpeg,png,jpg,svg'],

        ]);


        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;

       

        // $send_email = array(


        //     'name'      => trim($request['name']),
        //     'email'     => trim(strtolower($request['email'])),

        // );
        // if (!empty($send_email)) {
        //     //print_r($send_email['email']); exit;
        //     $mail = $send_email['email'];
        //     Mail::to($mail)->send(new TestMail($send_email));
        // }

        



        if ($request->logo) {
            //Upload Image
            $file = $request->file('logo');
            $filename = Uuid::uuid1()->toString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'upload/company/';
            $file->move($destinationPath, $filename);

            //Thumbs

            $img = Image::make($destinationPath . '/' . $filename);
            $img->resize(100, 100);
            $img->save(public_path('upload/company/' . $filename));
            $image = 'upload/company/' . $filename;
            $company->logo = $image;
        }
        $company->save();
        if ($company->save()) {
            Toastr::success('Company created successfully', 'Company', ["progressBar" => "true"]);
            return redirect()->route('company');
        } else {
            Toastr::error('Something went wrong! Please check and resubmit.', 'Company', ["progressBar" => "true"]);
            redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:companies,email,' . $company->id],

        ]);

        $company->name = $request->name;
        $company->email = $request->email;
        if ($request->logo) {
            //Upload Image
            $file = $request->file('logo');
            $filename = Uuid::uuid1()->toString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'upload/company/';
            $file->move($destinationPath, $filename);

            //Thumbs

            $img = Image::make($destinationPath . '/' . $filename);
            $img->resize(100, 100);
            $img->save(public_path('upload/company/' . $filename));
            $image = 'upload/company/' . $filename;
            $company->logo = $image;
        }
        $company->save();
        if ($company->save()) {
            Toastr::success('Company Edit successfully', 'Company', ["progressBar" => "true"]);
            return redirect()->route('company');
        } else {
            Toastr::error('Something went wrong! Please check and resubmit.', 'Company', ["progressBar" => "true"]);
            redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {

        if ($company->delete()) {
            Toastr::success('Company deleted successfully!', 'Company', ["progressBar" => "true"]);
            return redirect()->route('company');
        } else {
            Toastr::error('Something went wrong! Can not delete Company.', 'Company', ["progressBar" => "true"]);
            redirect()->back();
        }
    }
}
