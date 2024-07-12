<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKeys;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $apiKey = new ApiKey([
            'user_id' => Auth::id(),
            'key' => \Str::random(40),
            'name' => $request->name,
            'active' => true,
        ]);
        $apiKey->save();

        return redirect()->route('apikeys.index');
    }

    public function destroy(ApiKey $apiKey)
    {
        if ($apiKey->user_id != Auth::id()) {
            abort(403);
        }

        $apiKey->delete();
        return redirect()->route('apikeys.index');
    }
}
