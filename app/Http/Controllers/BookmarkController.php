<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($stockId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($stockId)) {
            $user->bookmark_stocks()->attach($stockId);
        }

        return back();
    }

    public function destroy($stockId) {
        $user = \Auth::user();
        if ($user->is_bookmark($stockId)) {
            $user->bookmark_stocks()->detach($stockId);
        }

        return back();
    }

    public function bookmark_stocks() {
        $stocks = \Auth::user()->bookmark_stocks;

        return view('bookmarks', compact('stocks'));
    }
}