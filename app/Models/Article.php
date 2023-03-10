<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'teaser' => $this->teaser,
        ];
    }


    // Override the default Searchable method
    public function shouldBeSearchable()
    {
        return $this->published == true;
    }
}
