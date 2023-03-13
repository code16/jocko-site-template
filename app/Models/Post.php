<?php

namespace App\Models;

use Code16\JockoClient\Eloquent\Casts\ImageCollection;
use Code16\JockoClient\Eloquent\Concerns\CastsCollection;
use Code16\JockoClient\Facades\JockoClient;
use Code16\JockoClient\Support\Image;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Sushi\Sushi;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property Collection<Image> $visuals
 */
class Post extends Model
{
    use Sushi;
    use CastsCollection;

    protected $casts = [
        'visuals' => ImageCollection::class,
    ];

    public function getRows(): array
    {
        // todo: Jocko must always send all properties to prevent SQL exception
        return $this->castCollection(JockoClient::getCollection('posts'));
    }

    protected function sushiShouldCache(): bool
    {
        return true;
    }

    public function cover(): Attribute
    {
        return Attribute::make(get: fn ($url) => new Image($url));
    }
}
