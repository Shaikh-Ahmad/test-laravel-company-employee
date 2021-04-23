<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required|image'
        ]);

        if ($request->hasFile('logo')) {
            
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension =  $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/logos',$fileNameToStore);
    
            }else
                {
                    $fileNameToStore = 'noimage.jpg';
                }


            $input_data=[
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'logo'=>  $fileNameToStore,
            ];
                
        Company::create($input_data);
        return redirect()->route('company.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|nullable',
           
        ]);

        if ($request->hasFile('logo')) {

            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension =  $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/logos',$fileNameToStore);
    
            }
            else
            {
                $fileNameToStore = 'noimage.jpg';
            }

        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if($request->hasFile('logo')){
            if( $company->logo != 'noimage.jpg')
            {
                Storage::delete('public/logos/'.$company->logo);
            }
            $company->logo = $fileNameToStore ;
        }
                
        $company->save();
        return redirect()->route('company.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if( $company->logo != 'noimage.jpg')
        {
            Storage::delete('public/logos/'.$company->logo);
        }
        $company->delete();
        return redirect()->route('company.index')->with('error', 'Company deleted successfully');
    }
}
