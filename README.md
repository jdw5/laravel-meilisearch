## Installing Scout with Meilisearch
```console 
composer require laravel/scout
```
```console 
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
```
```console 
composer require meilisearch/meilisearch-php http-interop/http-factory-guzzle
```
- Copy into .env 
```console
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=masterKey
``` 


## Using Scout
- On models to be indexed, apply the `use Searchable;` trait
- Select the attributes to searched by adding a function inside the Model and within the Scout config file
    - In model:
    ```
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'teaser' => $this->teaser,
        ];
    }
    ```
    - In config/scout.php
        ```
        'meilisearch' => [
            'host' => env('MEILISEARCH_HOST', 'http://localhost:7700'),
            'key' => env('MEILISEARCH_KEY', null),
            'index-settings' => [
                'articles' => [
                    'filterableAttributes'=> [
                        'title', 
                        'teaser'
                    ],
                ],
            ]            
        ]
        ```
- You can select which to be selected based on a field by either:
    - Within a controller or when doing query
        ```
        if ($query = $request->get('query')) {
            $results = Article::where('published', true)
                ->search($query)->paginate(10);
        }
        ```
    - Within the model by method overriding
        ```
        public function shouldBeSearchable()
        {
            return $this->published;
        }
        ```
- To search on a model, use the Search method from the Searchable trait
    ```
    Article::search($query)->get()
    ```
- Searching can be made more advanced
    ```
    $results = Article::search($query, function ($meilisearch, $query, $options) use ($request) {
        if ($userId = $request->get('user_id')) {
            $options['filters'] = 'user_id=' . $userId;
        }
        return $meilisearch->search($query, $options);
    })->paginate(10)->withQueryString();
    ```
    

## Custom project files
- [SearchController.php](https://github.com/jdw5/laravel-meilisearch/blob/main/app/Http/Controllers/SearchController.php)
- [Search.vue](https://github.com/jdw5/laravel-meilisearch/blob/main/resources/js/Pages/Search.vue)
- [Article.php (Model)](https://github.com/jdw5/laravel-meilisearch/blob/main/app/Models/Article.php)
- [GlobalSearch.php (Middleware)](https://github.com/jdw5/laravel-meilisearch/blob/main/app/Http/Middleware/GlobalSearch.php)
- [SearchBar.vue](https://github.com/jdw5/laravel-meilisearch/blob/main/resources/js/Search/SearchBar.vue)
