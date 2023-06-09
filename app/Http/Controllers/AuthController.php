<?php



namespace App\Http\Controllers;



use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;



class AuthController extends Controller

{

    public function index()

    {

        return view('auth.login');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function registration()

    {

        return view('auth.registration');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {

        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);



        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('students')

                ->withSuccess('You have Successfully loggedin');

        }



        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6'

        ]);



        $data = $request->all();

        $check = $this->create($data);



        return redirect("students")->withSuccess('Great! You have Successfully loggedin');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function students()

    {

        if(Auth::check()){

            return view('index');

        }



        return redirect("login")->withSuccess('Opps! You do not have access');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {

        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => Hash::make($data['password'])

        ]);

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();

        Auth::logout();



        return Redirect('/');

    }

}
