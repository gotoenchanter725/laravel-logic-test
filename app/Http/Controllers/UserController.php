<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

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
            $newUser = new User;
            $newUser->name = $data['name'];
            $newUser->phone = $data['phone'];
            $access_link = Hash::make($data['phone'] . date('Y-m-d H:i:s'));
            $access_link = str_replace("/", '_', $access_link);
            $access_link = str_replace("?", '_', $access_link);
            $newUser->link = $access_link;
            $newUser->expires_at = date('Y-m-d H:i:s', strtotime("5 days"));
            $newUser->save();

            return response()->json([
                'status' => 'success', 
                'response' => $newUser
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
        if ($rst && strtotime($rst['expires_at']) > strtotime('now')) {
            $request->session()->put('user', $rst);
            return redirect('/main');
        } else {
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
}
