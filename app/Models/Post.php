<?php

namespace App\Models;

use Code16\JockoClient\Eloquent\Casts\ImageCollection;
use Code16\JockoClient\Facades\JockoClient;
use Code16\JockoClient\Support\Image;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Sushi\Sushi;

/**
 * @property Collection<Image> $visuals
 */
class Post extends Model
{
    use Sushi;

    protected array $schema = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'visuals' => 'json',
    ];

    protected $casts = [
        'visuals' => ImageCollection::class,
    ];

    public function getRows(): array
    {
        return collect(JockoClient::getCollection('posts'))
            ->map(fn ($attributes) => [
                ...collect($this->schema)->mapWithKeys(fn ($value, $key) => [$key => null]),
                ...collect($attributes)->mapWithKeys(fn ($value, $key) => [$key => is_array($value) ? json_encode($value) : $value])

            ])->toArray();
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
