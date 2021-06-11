<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name','icon'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
  public function children()
  {
    return $this->hasMany(Category::class, 'parent_id');
  }


//     protected $table= "Categories";

}
