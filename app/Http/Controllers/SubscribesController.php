<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class SubscribesController extends Controller
{
    public function tagSubscribe(Request $request, $slug)
    {
    	$tag = Tag::where('slug', $slug)->first();

        $message = [];

        if ($currentUser = \Auth::user()) {

		    if ($tag->subscribers->contains($currentUser)) {
		        // $this->dispatch(new RemoveLikeFromAnswer($tag, \Auth::user()));

		        $tag->subscribers()->detach($currentUser);
		        $message['type'] = 'unsubscribe';
		    } else {
		    	$tag->subscribers()->attach($currentUser);
		        $message['type'] = 'subscribe';
		        // $this->dispatch(new AddLikeToAnswer($tag, \Auth::user()));
		    }
		}

        if ($request->ajax()) {
        	$message['count'] = $tag->subscribersCount;
        	$message['title'] = count_subscribers($message['count']);
            return $message;
        }
        
        return back();
    }
}
