<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;
use Auth;

use App\Verification;
use App\Mail\VerificationMail;
use Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $users = User::orderBy('id' , 'desc')->paginate(10);
        return view('manage.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('manage.users.create', compact('roles'));
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
            'password' => 'required'
        ]);

        $user = new User;
        
        
      $user->name = $request['name'];
      $user->email = $request['email'];
      $user->password = bcrypt($request['password']);

       $user->save();

      $user->Roles()->sync($request->role);

        $verify = Verification::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerificationMail($user));
        //return $user;
       

        $request->session()->flash('success', 'user was successfully saved | Email Sent');

        return redirect()->route('user.index');
    }

    public function verification($token)
    {
        $verify = Verification::where('token', $token)->first();
        if (isset($verify)) {
            $user = $verify->user;
            if (!$user->verified) {
                $verify->user->verified = 1;
                $verify->user->save();
                $status = "Your email is verified, you can login now";
            }else{
                $status = "Your email is already verified, you can login now";
            }
        }else{
           return redirect('/manage/users/index')->with('warning', 'Sorry your email cannot be identified');
        }
        return redirect('/manage/users/index')->with('success', $status);
    }

    protected function registered(Request $request, $user){
        $this->guard()->logout();
        return redirect('/manage/users/index')->with('success', 'We sent you an activation code. Check your email and click on the link to verify.');
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
        $roles = Role::all();
        $user = User::find($id);
        return view('manage.users.edit', compact('user','roles'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->radio == "auto") {
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i=0; $i < $length ; ++$i ) { 
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
        }elseif ($request->radio == 'manual') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->Roles()->sync($request->role);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
    {
    $user = User::find($id);
    
    $user->delete();
        
    $request->session()->flash('success', 'user deleted');

    return redirect()->route('user.index');
    }

    public function logout (Request $request){
        Auth::logout();
        return redirect()->route('login.user');
    }

    public function loginUsers(){
        return view('auth.login');
    }

    public function findUsers(Request $request){
         if (Auth::attempt([
            'email' => $request['email'], 
            'password' => $request['password']
         ])) {
            // Authentication passed...
            return redirect()->route('posts.index');
        }else{
            return "Wrong Email or Password";
        }
    }
}
