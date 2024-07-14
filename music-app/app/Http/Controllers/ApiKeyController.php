<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKeys;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{




    public function index()
       {
         $user = auth()->user();
            $apikeys = $user->apikeys;
           return Inertia::render('API/Index', [
                'apikeys' => ApiKeys::all(),
           ]);
       }
    public function create()
    {
        return view('apikeys.create');

    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $apiKey = new ApiKeys([
            'user_id' => $user->id,
            'key' => Str::random(40), // Generate a random API key
            'name' => 'Generated Key', // You might want to accept a name from the request
        ]);
        $apiKey->save();

        return redirect()->back()->with('message', 'API Key generated successfully.');
    }

    public function destroy(ApiKey $apiKey)
    {
        if ($apiKey->user_id != Auth::id()) {
            abort(403);
        }

        $apiKey->delete();
        return redirect()->route('apikeys.index');
    }
    public function getUserPlaylists()
    {
    $user = Auth::user(); // Get the authenticated user
    $playlists = $user->playlists; // Assuming there's a 'playlists' relationship defined in the User model

    return response()->json($playlists);
}


}
