<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Report $report)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $report->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back();
    }
}
