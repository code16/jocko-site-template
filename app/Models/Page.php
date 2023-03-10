<?php

namespace App\Models;

use Code16\JockoClient\Facades\JockoClient;
use Code16\JockoClient\Support\Image;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Page extends Model
{
    use Sushi;

    protected array $schema = [
        'id' => 'integer',
        'key' => 'string',
        'title' => 'string',
        'content' => 'string',
    ];

    public function getRows(): array
    {
        return JockoClient::getCollection('pages');
    }

    protected function sushiShouldCache(): bool
    {
        return true;
    }

    public function cover(): Attribute
    {
        return Attribute::make(fn ($value) => new Image($value));
    }
}
