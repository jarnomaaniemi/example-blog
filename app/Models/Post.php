<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Allowed attributes in mass assigment e.g. Post::create([mass => assign, variable => here])
    // protected $fillable = ['title', 'excerpt', 'body'];

    // Mass assignment allowed for all attributes for Model::create([attributes]) except guarded ones
    // protected $guarded = ['id'];

    // Don't provide possibility to mass assign attributes that you don't have control over to Model::create([attributes])
    protected $guarded = [];

    // Default for every post query you make, you can add to eager loading
    protected $with = ['category', 'author'];

    // Setting the default key that route model binding is looking from database
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function category() // assumption => foreing key = category_id
    {
        // relationship: hasOne, hasMany, belongsTo, belongsToMany
        // You get access to category name $post->category->name
        return $this->belongsTo(Category::class);
    }

    public function author() // assumption => foreing key = author_id
    {
        // Override foreign key assumption 'author_id' with 'user_id'
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * This is a Query Scope named as filter()
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(fn ($query) =>
            $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%')) // SQL syntax %foo%
        );

        // SELECT*FROM posts WHERE EXISTS ( SELECT*FROM categories WHERE categories.id = posts.category_id AND categories.slug ='consequuntur-nam-et-beatae-laborum-labore')
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
            $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
            $query->where('username', $author))
        );
    }
}
