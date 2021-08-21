<?php

namespace App\Http\Controllers;

use App\Models\LinkShortener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $links = LinkShortener::query()->where('user_id',  Auth::id())->get();
        return view('dashboard.dashboard', ['links'=>$links]);
    }

    public function delete($id)
    {
        $url = LinkShortener::find($id);
        if ($url !== null){
            $url->delete();
        }
        return redirect(route('dashboard.index'));
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
