<?php

namespace App\Http\Controllers;

use App\Models\LinkShortener;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LinkShortenerController extends Controller
{
    public function index()
    {
        return view('shortenLink', [
            'shortLinks' => LinkShortener::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'link'=>'required|url',
        ]);
        $userId = null;
        $expires = Carbon::now()->addSeconds(15);
        if (\Auth::user() !== null) {
            $userId = \Auth::id();
            $expires = null;
        }
        $link = LinkShortener::create([
            'link'=>$request->link,
            'code'=>str_random(6),
            'user_id' => $userId,
            'expired_at'=>$expires
        ]);

        return redirect()->route('homepage')
            ->with(['success' => 'Короткая ссылка успешно создана!', 'code' => $link->code]);
    }
    public function shortenLink($code)
    {
        /**
         * @var LinkShortener|null $find
         */
        $find = LinkShortener::where('code', $code)->first();
        if ($find === null) {
            abort(404);
        }

        if ($find->expired_at !== null && $find->expired_at->isBefore(Carbon::now())) {
            $find->delete();
            abort(404);
        }

        $find->count++;
        $find->save();

        return redirect($find->link);
    }
}
