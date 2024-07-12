<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use Illuminate\Support\Facades\Auth;

class ApiKeyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $apiKeys = ApiKey::where('user_id', Auth::id())->get();
        return view('apikeys.index', compact('apiKeys'));
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
