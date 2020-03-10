<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Club;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        if($request->sports AND $request->city  AND $request->county ){
            $clubs = Club::where([["sports", "=", $request->sports],["city", "=", $request->city],["county", "=", $request->county]])
                        ->latest()
                        ->paginate(10); 
        }
        elseif($request->sports AND $request->city){
            $clubs = Club::where([["sports", "=", $request->sports],["city", "=", $request->city]])
                        ->latest()
                        ->paginate(10);
        }
        elseif($request->sports AND $request->county){
            $clubs = Club::where([["sports", "=", $request->sports],["county", "=", $request->county]])
                            ->latest()
                            ->paginate(10);
        }
        elseif($request->city AND $request->county){
            $clubs = Club::where([["city", "=", $request->city],["county", "=", $request->county]])
                            ->latest()
                            ->paginate(10);
        }
        elseif($request->sports OR $request->city  OR $request->county ){
            $clubs = Club::where("sports", "=", $request->sports)
                        ->orWhere("city", "=", $request->city)
                        ->orWhere("county", "=", $request->county)
                        ->latest()
                        ->paginate(10); 
        }
        else{
            $clubs = Club::latest()->paginate(10);
        }
        return view('clubs.index', compact('clubs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        $club = Club::findOrFail($club->id);
        $comments = Comment::where('club_id', '=', $club->id)->latest()->get();
        
        return view('clubs.show', compact('club','comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUserClubs()
    {
        $user = auth()->user();
        $clubs = Club::where("user_id", "=", $user->id)->get();
        
        return view('home', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        request()->validate([
            'agreement' => ['accepted'],
            'name' => ['required','string'],
            'sports' => ['required','array'],
            'description' => ['required','string'],
            'address' => ['required','string'],
            'city' => ['required','string'],
            'county' => ['required','string'],
            'postcode' => ['required','regex:/[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][A-Z]{2}/u'],
            'phone_number' => ['required'],
            'email' => ['required','email:rfc,dns'],
            'price' => ['required','numeric','max:100'],
            'image' => ['required','image','max:2048']
        ]);

        $imagePath = $request->image->store('uploads', 'public');

        $club = Club::create([
            'name' => $request->name,
            'sports' => implode(',', $request->sports),
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'county' => $request->county,
            'postcode' => $request->postcode,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'price' => $request->price,
            'image' => $imagePath,
            'user_id'=> Auth::user()->id
            ]);

            return redirect()->route('clubs.show', $club)->with('success','Club created with success !');
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        $this->authorize('update', $club);
        $myClub = Club::findOrFail($club->id);
        $sports = explode(',',$myClub->sports);

        return view('clubs.edit', compact(['club','sports']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Club $club)
    {
        $this->authorize('update', $club);
        $myClub = Club::findOrFail($club->id);

        request()->validate([
            'agreement' => ['accepted'],
            'name' => ['required','string'],
            'sports' => ['required','array'],
            'description' => ['required','string'],
            'address' => ['required','string'],
            'city' => ['required','string'],
            'county' => ['required','string'],
            'postcode' => ['required','regex:/[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][A-Z]{2}/u'],
            'phone_number' => ['required'],
            'email' => ['required','email:rfc,dns'],
            'price' => ['required','numeric','max:100'],
            'image' => ['required','image','max:2048']
        ]);

        $imagePath = $request->image->store('uploads', 'public');

        $myClub->update([
            'name' => $request->name,
            'sports' => implode(',', $request->sports),
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'county' => $request->county,
            'postcode' => $request->postcode,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'price' => $request->price,
            'image' => $imagePath,
            'user_id'=> Auth::user()->id
        ]);

            return redirect()->route('clubs.show', $club)->with('success','Club updated with success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $this->authorize('delete', $club);

        Club::destroy($club->id);

        $user = auth()->user();
        $clubs = Club::where("user_id", "=", $user->id)->get();

        return view('home', compact('clubs'))->with('success','Club deleted with success !');
    }

    public function likeClub(Club $club)
    {
        $myClub = Club::findOrFail($club->id);
        $userId = Auth::user()->id;
        
        if (empty($myClub->hasVoted)){
            $myClub->update([
                'hasVoted' => $userId,
                $myClub->increment('likes', 1)
            ]);
            return redirect()->route('clubs.show', $myClub->id)->with('success','Vote added with succes!');
        }
        else{
            $voters = explode(",",$myClub->hasVoted);

            if (in_array($userId,$voters)){
                return redirect()->route('clubs.show', $club)->with('warning','Action impossible: You have already voted for this club !');
            }
            else{
                array_push($voters, $userId);

                $myClub->update([
                    'hasVoted' => implode(",",$voters),
                    $myClub->increment('likes', 1)
                ]);
                return redirect()->route('clubs.show', $$club)->with('success','Vote added with succes!');
            }
        }
    }

    public function dislikeClub(Club $club)
    {
        $myClub = Club::findOrFail($club->id);
        $userId = Auth::user()->id;
        
        if (empty($myClub->hasVoted)){
            $myClub->update([
                'hasVoted' => $userId,
                $myClub->increment('dislikes', 1)
            ]);

            return redirect()->route('clubs.show', $myClub->id)->with('succes','Vote added with succes!');
        }
        else{
            $voters = explode(",",$myClub->hasVoted);

            if (in_array($userId,$voters)){
                return redirect()->route('clubs.show', $myClub->id)->with('warning','You have already voted for this club !');
            }
            else{
                array_push($voters, $userId);

                $myClub->update([
                    'hasVoted' => implode(",",$voters),
                    $myClub->increment('dislikes', 1)
                ]);
                return redirect()->route('clubs.show', $club)->with('succes','Vote added with succes!');
            }
        }
    }
}
