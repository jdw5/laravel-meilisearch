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
            // $results = Article::search($query)
            //     ->paginate(10);
            $results = Article::search($query, function ($meilisearch, $query, $options) use ($request) {
                if ($userId = $request->get('user_id')) {
                    $options['filters'] = 'user_id=' . $userId;
                }
                return $meilisearch->search($query, $options);
            })->paginate(10)->withQueryString();
        }
        
        return Inertia::render('Search', [
            'results' => $results,
        ]);
    }
}
