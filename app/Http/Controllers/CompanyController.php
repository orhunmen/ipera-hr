<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Company::all();
        return view('cindex', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCompany');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $validator = Validator::make($data->all(), [
            'name' => 'required|max:255|unique:companies',
            'address' => 'max:255',
            'phone' => 'max:255',
            'email' => 'email|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect('createCompany')
                ->withErrors($validator)
                ->withInput();
        }

        $cmp = new Company;
        $cmp->name = $data->name;
        $cmp->address = $data->address;
        $cmp->phone = $data->phone;
        $cmp->email = $data->email;

        if($request->hasFile('logo')){
            $path = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('logos'), $path);
            $cmp->logo = "/logos"."/".$path;
        }
        $cmp->website = $data->website;
        $cmp->save();

        return redirect('home');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function select()
    {
        $users = Company::all();
        return view('selectCmp', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Company::where('name', $request->name)->firstOrFail();
        return view('updateCompany', ['user' => $user]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($validator->fails()) {
            return redirect("selectCmp")
                ->withErrors($validator)
                ->withInput();
        }

        $cmp = Company::where('name', $request->name)->firstOrFail();
        $cmp->name = $request->name;
        $cmp->address = $request->address;
        $cmp->phone = $request->phone;
        $cmp->email = $request->email;
        if($request->hasFile('logo')){
            $path = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('logos'), $path);
            $cmp->logo = "/logos"."/".$path;
        }
        $cmp->website = $request->website;
        $cmp->save();

        return redirect('home');
    }

    public function select2deleteCmp()
    {
        $users = Company::all();
        return view('select2deleteCmp', ['users' => $users]);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Company::where('name', $request->name)->firstOrFail();
        $user->delete();
        return redirect('home');
    }
}
