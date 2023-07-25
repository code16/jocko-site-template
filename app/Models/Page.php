<?php

namespace App\Models;

use Code16\JockoClient\Eloquent\Concerns\CastsCollection;
use Code16\JockoClient\Facades\JockoClient;
use Code16\JockoClient\Support\Image;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;


class Page extends Model
{
    use Sushi;
    use CastsCollection;

    protected array $schema = [
        'id' => 'integer',
        'key' => 'string',
        'title' => 'string',
        'content' => 'string',
//        'cover' => 'string',
    ];

    public function getRows(): array
    {
        return $this->castCollection(JockoClient::getCollection('pages'));
    }

    public function cover(): Attribute
    {
        return Attribute::make(fn ($url) => Image::make($url));
    }
}
