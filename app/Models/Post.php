<?php

namespace App\Models;

use Code16\JockoClient\Facades\JockoClient;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Post extends Model
{
    use Sushi;

    protected array $schema = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
    ];

    public function getRows()
    {
        return JockoClient::getCollection('posts');
    }
}
