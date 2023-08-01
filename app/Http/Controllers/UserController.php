<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LikedDetail;
use App\Models\LikedHeader;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myFriends(){
        $id = auth()->user()->id;

        $myDetails = LikedDetail::whereHas('LikedHeader', function($q){
            $q->where('status', 'match');
        })->where('user_id', $id)->get();
        $arr  = [];

        foreach($myDetails as $mydetail){
            $arr[] = $mydetail->liked_header_id;
        }

        $others = LikedDetail::whereIn('liked_header_id', $arr)
        ->where('user_id', '!=', $id)
        ->get();

        return view('myFriend', compact('others'));
    }

    public function thumb(Request $request){
        $dia = $request['id'];

        $matchDia = LikedDetail::select('liked_header_id')
        ->where('user_id', $dia)
        ->orWhere('user_id', auth()->user()->id)
        ->groupBy('liked_header_id')
        ->havingRaw('COUNT(*) > 1')
        ->get();

        if($matchDia->count() > 0){//ada match sebelumnya sama dia
            $matchHeader = LikedHeader::find($matchDia[0]->liked_header_id);
            $header = LikedHeader::find($matchHeader->id);
            $header->status = "match";
            $header->update();
        }else{//belum ada match sebelumnya

            $newHeader = new LikedHeader();
            $newHeader->status = "waiting-".auth()->user()->gender;
            $newHeader->save();

            $matchDetailGue = new LikedDetail();
            $matchDetailGue->liked_header_id = $newHeader->id;
            $matchDetailGue->user_id = auth()->user()->id;
            $matchDetailGue->save();

            $matchDetailDia = new LikedDetail();
            $matchDetailDia->liked_header_id = $newHeader->id;
            $matchDetailDia->user_id = $dia;
            $matchDetailDia->save();
        }

        return redirect('/user');
    }

    public function topUp(){

        return view('topUp');
    }

    public function updateWallet(Request $request){
        $user = User::find(auth()->user()->id);
        $user->wallet = $user->wallet + $request->wallet;
        $user->update();

        return redirect('/top-up');
    }
}
