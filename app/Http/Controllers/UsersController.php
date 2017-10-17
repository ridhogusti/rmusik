<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\Transformers\UserTransformer;
use Auth;
use JWTAuth;
use App\Dsiswa;
use App\Ortu;
use App\Dguru;
use App\Wkelas;
use Hash;
class UsersController extends Controller
{

  // public function register(Request $request)
  // {
  //   $this->validate($request, [
  //     'name' => 'required',walimurid
  //     'email' => 'required|email|unique:users',
  //     'akses' => 'required',
  //     'password' => 'required|min:6'
  //   ]);
  // }
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  // protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */

  public function index(Request $request)
  {
    $akses = $request->get('akses');
    $perPage = 25;


    if (!empty($akses)) {
        if ($akses == 'siswa') {
          $user = User::where('akses','siswa')->get();
          $options = Dsiswa::whereNotIn('id',$user->pluck('user_id'))->get();
        }elseif ($akses == 'walimurid') {
          $user = User::where('akses','walimurid')->get();
          $options = Ortu::whereNotIn('id',$user->pluck('user_id'))->get();
        }elseif ($akses == 'guru') {
          $user = User::where('akses','guru')->get();
          $options = Dguru::whereNotIn('id',$user->pluck('user_id'))->get();
        }elseif ($akses == 'walikelas') {
          $user = User::where('akses','walikelas')->get();
          $options = Wkelas::whereNotIn('id',$user->pluck('user_id'))->get();
        }
    } else {
      // $jadwals = Jadwal::paginate($perPage);
    }

    return view('admin.users.create', compact('akses','options'));
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
      'akses' => 'required',
      ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return User
  */
  protected function create(Request $request,User $user)
  {

    // $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //         'akses' => $data['akses'],
    //     ]);
    //     $aksesRole = Role::where('name', $data['akses'])->first();
    //     $user->attachRole($aksesRole);
    //     return $user;

    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'akses' => 'required',
      'password' => 'required|min:6',
      ]);
    $name = $request->get('name');
    if ($request->get('akses') == 'siswa') {
      $user_id = Dsiswa::where('name',$name)->first();
    }elseif ($request->get('akses') == 'walimurid') {
      $user_id = Ortu::where('name',$name)->first();
    }elseif ($request->get('akses') == 'guru') {
      $user_id = Dguru::where('name',$name)->first();
    }elseif ($request->get('akses') == 'walikelas') {
      $user_id = Wkelas::where('name',$name)->first();
    }
        
    $user = $user->create([
      'name'=>$request->name,
      'email'=>$request->email,
      'akses'=>$request->akses,
      'password'=>bcrypt($request->password),
      'api_token'=>bcrypt($request->email),
      'user_id' => $user_id->id,
      'status' =>"0"
      ]);
    $aksesRole = Role::where('name', $request->akses)->first();
    $user->attachRole($aksesRole);

    // $response = fractal()->item($user)
    // ->transformWith(new UserTransformer)
    // ->addMeta([
    //   'token' => $user->remember_token,
    // ])
    // ->toArray();
    //
    // return response()->json($response, 201);

    return redirect('admin/users');
  }
  public function update($id, Request $request)
  {
    $user = User::findOrFail($id);
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'akses' => 'required',
      ]);

    $requestData = $request->all();
    $aksesRole = Role::where('name', $request->akses)->first();
    $user->roles()->sync($aksesRole);
    // return $requestData;
    $user->update($requestData);
    // Session::flash('update_message', 'Berita updated!');

    return redirect('admin/users');
  }
  public function edit($id)
  {
    $options = ['guru'=>'Guru','walikelas'=>'Wali Kelas','walimurid'=>'Wali Murid','siswa'=>'Siswa'];
    $user = User::findOrFail($id);

    return view('admin.users.edit', compact('user','options'));
  }
  public function profile(User $user)
  {
    $user = $user->find(JWTAuth::toUser()->id);
    // $user = $this->user->where('id', '=', $id)->get();

    $response = fractal()
    ->item($user)
    ->transformWith(new UserTransformer)
    ->includeTaks()
    ->includeBerita()
    ->includeDguru()
    ->includeDsiswa()
    ->includeWkelas()
    ->includeKelas()
    ->toArray();
    return response()->json($response,200);
  }
  public function users(User $user)
  {
    $users = $user::where('akses','member')->paginate(10);
    // return $users;

    // $users['walikelas'] = $user::where('akses', 'walikelas')->paginate(10);
    // $users['walimurid'] = $user::where('akses', 'walimurid')->paginate(10);
    // $users['guru'] = $user::where('akses', 'guru')->paginate(10);
    // $users['siswa'] = $user::where('akses', 'siswa')->paginate(10);

    // $users = $user->all();
    //
    // return fractal()->collection($users)
    // ->transformWith(new UserTransformer)
    // ->toArray();
    // return response()->json($users);


    return view('admin.users', compact('users','walikelas','walimurid','siswa'));
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);
    // if ($user->akses == 'guru') {
    //   $guru = Dguru::
    // }
    // $this->authorize('delete', $user);
    $user->delete();
      // Dguru::destroy($id);

      // Session::flash('flash_message', 'Dguru deleted!');

    return redirect('admin/users');
  }

}