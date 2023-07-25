<?php

namespace App\Models;

use Code16\JockoClient\Eloquent\Concerns\CastsCollection;
use Code16\JockoClient\Facades\Jocko;
use Code16\JockoClient\Support\Image;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Post extends Model
{
    use Sushi;
    use CastsCollection;

    protected array $schema = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
//        'cover' => 'string',
//        'visuals' => 'string',
    ];

    public function getRows(): array
    {
        return $this->castCollection(Jocko::getCollection('posts'));
    }

    public function cover(): Attribute
    {
        return Attribute::make(fn ($url) => Image::make($url));
    }

    public function visuals(): Attribute
    {
        return Attribute::make(fn ($visuals) => Image::collection($this->fromJson($visuals)));
    }

    protected function sushiShouldCache(): bool
    {
        return Jocko::shouldCache();
    }
}
