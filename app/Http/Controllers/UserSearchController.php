<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserSearchController extends Controller
{
    public function index(Request $request){

     $users = User::query()
        ->when($request->filled('name'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name . '%');
        })
        ->when($request->filled('specialite'), function ($query) use ($request) {
            $query->where('specialite', 'like', '%' . $request->specialite . '%');
        })
        ->where('id', '!=', auth()->id()) 
        ->get();

    return view('search.index', compact('users'));

}

}
