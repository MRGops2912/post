<?php
namespace App\Http\Middleware;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Models\ecomm;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Auth;
use Auth;

class user extends Controller
{

     public function __construct()
    {
        //$this->middleware('auth')->only(store);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

 return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)

    {
        $req->validate([
            'name'        =>      'required',
            'email'             =>      'required|email',
            'password'          =>      'required|'

        ]);

        $data=DB::table('ecomm')->where('email',$req->email)->where('password',$req->password)->count();




        if($data==!null){


            $data1= $req->session()->put('login','Active');

             if($req->session()->has('login')){

            return view('master');
        }
        else{
            return redirect('/');
        }
    }
      else{
          return redirect('/');
      }

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {


         return redirect('/');
    }

  public function delete(Request $req)
  {
    $req->session()->forget('login');
   //  $cookie =\Cookie::forgot('myCookie');
     Auth::logout();
     return redirect('/');
  }

  public function datashow(){

    $data=ecomm::all();

return ($data);
  }
}
