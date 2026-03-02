<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

// Практика 7 - Задания 6, 19, 21
class Article extends Model
{
    use HasFactory;

    protected $table = 'blog_articles';

    protected $guarded = [
        'views_count',
    ];

    protected static function booted()
    {
        static::addGlobalScope('published', function (Builder $builder) {
            $builder->whereNotNull('published_at');
        });
    }


    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strip_tags(trim($value)),
        );
    }

    // Практика 8 - Задание 5
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
