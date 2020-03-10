<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth'); 
    }

    public function store(Request $request, Club $club)
    {
        $myClub = Club::findOrFail($club->id);
        $club = $myClub->id;


        request()->validate([
            'content' => ['required','string'],
        ]);

        $myComment = Comment::create([
            'content' => $request->content,
            'user_id'=> Auth::user()->id,
            'club_id' => $club
            ]);

        return redirect()->route('clubs.show',compact('club'))->with('success','Comment added with success !');
    
    }

    public function update(Request $request,Comment $comment)
    {
        $this->authorize('update', $comment);

        $myComment = Comment::findOrFail($comment->id);

        request()->validate([
            'content' => ['required','string'],
        ]);

        $myComment->update([
            'content' => $request->content,
        ]);

        $club = $comment->club_id;

            return redirect()->route('clubs.show', $club)->with('success','Club updated with success !');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $club = $comment->club_id;
        Comment::destroy($comment->id);

        return redirect()->route('clubs.show', $club)->with('success','Comment deleted with success !');
    }

    public function signal(Comment $comment)
    {
        $myComment = Comment::findOrFail($comment->id);
        $userId = Auth::user()->id;
        $club = $myComment->club_id;
        
        if ($myComment->signalments == 0){
            $myComment->update([
                'hasSignaled' => $userId,
                $myComment->increment('signalments', 1)
            ]);

            return redirect()->route('clubs.show', $club)->with('success','Comment signaled with success!');
        }
        else{
            $signalers = explode(",",$myComment->hasSignaled);

            if (in_array($userId,$signalers)){
                return redirect()->route('clubs.show', $club)->with('warning','You have already signaled this comment !');
            }
            else{
                array_push($voters, $userId);

                $myComment->update([
                    'hasSignaled' => implode(",",$signalers),
                    $myComment->increment('signalments', 1)
                ]);

                if($myComment->signalments >= 5){
                    Comment::destroy($myComment->id);
                }
                return redirect()->route('clubs.show', $club)->with('succes','Comment signaled with success!');
            }
        }
    }
}
