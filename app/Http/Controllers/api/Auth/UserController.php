<?php

namespace App\Http\Controllers\api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
  /*  use IssueTokenTrait;
    private $client;
    public function __construct(){
        //$this->content = array();
        $this->client = Client::find(1);
    }
    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        return $this->issueToken($request, 'password');
    }
    public function refresh(Request $request){
        $this->validate($request, [
            'refresh_token' => 'required'
        ]);
        return $this->issueToken($request, 'refresh_token');
    }
    public function logout(Request $request){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json([], 204);
    }*/

    /*public function __construct()
    {
        $this->content = array();
    }*/
    /*public function login1(Request $request)
    {
        // dd(request('name'));
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            //$user = Auth::user();
            //$this->content['token'] =  $user->createToken('Pi App')->accessToken;
            $status = 200;
        } else {
            $this->content['error'] = "未授权";
            $status = 401;
        }
        return $this->issueToken($request, 'password');
        //return response()->json($this->content, $status);

    }*/
    public $successStatus = 200;
    public function register1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }
/*    public function index(){
        $posts = "hello mallo server";
        return response()->json(['data' => $posts], 200, [], JSON_NUMERIC_CHECK);
    }*/
    public function login1(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
    public function index(){
        $posts = Auth::user()->posts()->get();
        //return response()->json(['data' => $posts], 200, [], JSON_NUMERIC_CHECK);
/*        $posts = [
            'id' => 1,
            'test' => "hello mallo server"];*/
        return response()->json(['success' => $posts], 200, [], JSON_NUMERIC_CHECK);
    }
    public function logout(Request $request){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json(['logout' => 'logout successful'], 204);
    }





    use IssueTokenTrait;
    private $client;
    public function __construct(){
        //$this->content = array();
        $this->client = Client::find(2);
    }
    public function login(Request $request)
    {
        //dd(User::all());
        //dd($request->all());
        Validator::make($request->all(), [
        ]);
        return $this->issueToken($request, 'password');
    }
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'avatar' => request('avatar'),
            'confirmation_token' => request('confirmation_token')
        ]);
        return $this->issueToken($request, 'password');
    }


    public function me()
    {
        return Auth::user();
    }
}

