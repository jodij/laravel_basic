<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//    use HasFactory, Sluggable;

//    protected $fillable = ['ref_id', 'title', 'excerpt', 'image', 'body'];

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category)
        {
            return $query->whereHas('category', function ($query) use ($category)
            {
                $query->where('ref_id', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('ref_id', $author)));

        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'ref_id';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//    }

}


