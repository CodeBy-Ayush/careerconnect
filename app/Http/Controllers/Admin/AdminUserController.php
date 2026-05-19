<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index() {
    $users = \App\Models\User::where('role', 'user')->latest()->paginate(15);
    return view('admin.users.index', compact('users'));
}
}
