<?php

namespace App\Models;

use Code16\JockoClient\Facades\JockoClient;
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
        'cover' => 'string',
    ];

    public function getRows()
    {
        return JockoClient::getCollection('pages');
    }
}
