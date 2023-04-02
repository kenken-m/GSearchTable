<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // ユーザが入力したキーワードを取得
        $query = $request->input('query');
        
        // キーワード入力チェック
        if(isset($query)){
            // Custom Search JSON APIを使ってGoogle検索結果を取得
            $response = Http::get('https://www.googleapis.com/customsearch/v1', [
                'key' => config('services.google.custom_search_json_api_key'),
                'cx' => '43beb014663d34ee2',
                'q' => $query,
            ]);

            // レスポンスから検索結果を取得
            $items = collect($response->json()['items'])->map(function ($item) {
                return [
                    'title' => $item['title'],
                    'link' => $item['link'],
                ];
            });
        }

        // 検索結果をビューに渡して表示
        return view('search', [
            'query' => $query,
            'items' => $items,
        ]);
    }

}
