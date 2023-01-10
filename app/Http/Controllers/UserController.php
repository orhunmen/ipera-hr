<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $users = Employee::all();
        return view('index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:employees|email|max:255',
            'phone' => 'max:255',
            'company' => 'max:25|exists:companies,name',
        ]);

        if ($validator->fails()) {
            return redirect('create')
                ->withErrors($validator)
                ->withInput();
        }

        $emp = new Employee;
        $emp->first_name = $data->first_name;
        $emp->last_name = $data->last_name;
        $emp->email = $data->email;
        $emp->phone = $data->phone;
        $emp->company = $data->company;
        $emp->save();

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
        $users = Employee::all();
        return view('selectEmp', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $data)
    {
        $data = explode( ' ', $data->employee );
        $user = Employee::where('first_name',$data[0])->where('last_name',$data[1])->firstOrFail();
        return view('update', ['user' => $user]);
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:employees|email|max:255',
            'phone' => 'max:255',
            'company' => 'max:25|exists:companies,name',
        ]);

        $emp = Employee::where('first_name',$request->first_name)->where('last_name',$request->last_name)->firstOrFail();

        if ($validator->fails()) {
            return redirect('selectEmp')
                ->withErrors($validator)
                ->withInput();
        }

        $emp->email = $request->email;
        $emp->phone = $request->phone;
        $emp->company = $request->company;
        $emp->save();

        return redirect('home');
    }


    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('home');
    }
}
