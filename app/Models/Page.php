<?php

namespace App\Models;

use Code16\JockoClient\Eloquent\Concerns\CastsCollection;
use Code16\JockoClient\Facades\JockoClient;
use Code16\JockoClient\Support\Image;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

/**
 * @property int $id
 * @property string $key
 * @property string $title
 * @property string $content
 */
class Page extends Model
{
    use Sushi;
    use CastsCollection;

    public function getRows(): array
    {
        return $this->castCollection(JockoClient::getCollection('pages'));
    }

    public function cover(): Attribute
    {
        return Attribute::make(fn ($value) => new Image($value));
    }
}
