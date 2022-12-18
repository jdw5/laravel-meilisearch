<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $results = null;

        if ($query = $request->get('query')) {
            $results = Article::search($query)
                ->where('published', true)
                ->get();
        }
        return Inertia::render('Search', [
            'results' => $results,
        ]);
    }
}
