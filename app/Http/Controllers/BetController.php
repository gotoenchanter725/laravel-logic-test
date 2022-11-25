<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bet;

class BetController extends Controller
{

    /**
     * Do the bet
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bet(Request $request) {
        try {
            $new_bet = new Bet;
            $new_bet->userId = $request->session()->get('user')->id;
            $new_bet->value = rand(1, 1000);
            $new_bet->save();

            return response()->json([
                'status' => 'success', 
                'response' => $new_bet
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
    public function history(Request $request) {
        try {
            $rst = Bet::where('userId', $request->session()->get('user')->id)->orderBy('id', 'desc')->limit(3)->get();
            return response()->json([
                'status' => 'success', 
                'response' => $rst
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error', 
                'errMessage' => $th->getMessage()
            ]);
        }
    }
}
