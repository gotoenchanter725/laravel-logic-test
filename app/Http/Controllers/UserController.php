<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    /**
     * Show the Home Page.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        return view('pages.home', [
            'user' => $request->session()->get('user')
        ]);
    }

    /**
     * Show the User Register Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function page()
    {
        return view('pages.users.register');
    }

    /**
     * create the new User
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = $request->input();
        $rst = User::where('phone', '=', $data['phone'])->first();

        if (!$rst) {
            $new_user = new User;
            $new_user->name = $data['name'];
            $new_user->phone = $data['phone'];
            $access_link = Hash::make($data['phone'] . date('Y-m-d H:i:s'));
            $access_link = str_replace("/", '_', $access_link);
            $access_link = str_replace("?", '_', $access_link);
            $new_user->link = $access_link;
            $new_user->expires_at = date('Y-m-d H:i:s', strtotime("5 days"));
            $new_user->save();

            return response()->json([
                'status' => 'success', 
                'response' => $new_user
            ]);
        } else {
            return response()->json([
                'status' => 'error', 
                'errMessage' => 'This phone number was already used.'
            ]);
        }
    }

    /**
     * Check the access link and process
     *
     * @param  \Illuminate\Http\Request $request
     * @return redirect
     */
    public function check(Request $request, $access_link) {
        $rst = User::where('link', '=', $access_link)->first();
        if ($rst && strtotime($rst['expires_at']) > strtotime('now') && $rst->link_active) {
            $request->session()->put('user', $rst);
            return redirect('/main');
        } else {
            $request->session()->forget('user');
            return redirect('/');
        }
    }

    /**
     * Show the Main Page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function main(Request $request)
    {
        return view('pages.main', [
            'user' => $request->session()->get('user', [
                'user' => $request->session()->get("user")
            ])
        ]);
    }

    /**
     * Recreate the access link
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recreate(Request $request) {
        try {
            $user = $request->session()->get('user');
            $access_link = Hash::make($user->phone . date('Y-m-d H:i:s'));
            $access_link = str_replace("/", '_', $access_link);
            $access_link = str_replace("?", '_', $access_link);
            $user->link = $access_link;
            $user->save();

            $request->session()->put('user', $user);
    
            return response()->json([
                'status' => 'success', 
                'response' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error', 
                'errMessage' => $th->getMessage()
            ]);
        }
    }

    /**
     * Deactivate the User
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deactivate(Request $request) {
        try {
            $user = $request->session()->get('user');
            $user->link_active = !$user->link_active;
            $user->save();
    
            return response()->json([
                'status' => 'success', 
                'response' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error', 
                'errMessage' => $th->getMessage()
            ]);
        }
    }

    /**
     * logout
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {
        $user = $request->session()->flush();
        return redirect('/');
    }
}
