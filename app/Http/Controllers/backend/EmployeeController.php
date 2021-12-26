<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\employee;
use App\Models\information;
use App\Models\order;

class EmployeeController extends Controller
{
    private $pathView= 'backend.contents.employee.employee_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = Employee::where('empID', session()->get('empID'))->first();
        $employee = Employee::orderBy('roleID')->get();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView.'index', [
            'empSS' => $empSS,
            'employee' => $employee,
             'i' => 1,
             'countNewOrder' => $countNewOrder,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empSS = Employee::where('empID', session()->get('empID'))->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView.'add', [
            'empSS' => $empSS,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new information;
        $information->infoID =  random_int(1000, 9999);
        $information->save();

        $employee = new Employee;
        $employee->empID = $request->role .random_int(10000, 99999);
        $employee->username = $request->username;
        $employee->password = Hash::make($request->password);
        $employee->roleID = $request->role;
        $employee->infoID =  $information->infoID;
        $employee->save();

        return redirect()->route('nhan-vien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($empID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $employee = employee::where('empID', $empID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                                ->where('statusID', 1)
                                ->get()
                                ->count();
        return view($this->pathView.'edit', [
            'empSS' => $empSS,
            'employee' => $employee,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $empID)
    {
        if($request->hasFile('avatar')){
            $filename = $request->file('avatar')->getClientOriginalName();
            $img = $empID .'_'. $filename;
            $request->file('avatar')->storeAs('public/uploads/avatar', $img);
            $avatar = 'storage/uploads/avatar/' .$img;
        }else{
            $employee = employee::where('empID', $empID)->first();
            $avatar = $employee->information->avatar;
        }
        $employee = employee::where('empID', $empID)->first();

        if($request->roleID){
            Employee::where('empID', $empID)
                    ->update([
                        'roleID' => $request->role,
                    ]);
        }

        $infoID = $employee->information->infoID;
        Information::where('infoID', $infoID)
                ->update([
                    'name' => $request->name,
                    'avatar' => $avatar,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);
        return redirect()->route('nhan-vien.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($empID)
    {
        $employee = Employee::where('empID', $empID);
        $employee->delete();
        return redirect()->route('nhan-vien.index');
    }
}
