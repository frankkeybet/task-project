<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    //old way for Accessors
    // public function getNameAttribute($value)
    // {
    //    return Str::lower($value);
    // }

     /**Old way for Mutators */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = Str::lower($value);
    // }

    /**New way for Accessors*/
    // protected function name(): Attribute
    // {
    //     return Attribute::make(
    //         // get: fn ($value) => Str::lower($value),
    //         set: fn ($value) => Str::upper($value),
    //     );
    // }

    /**New way for Mutators */

    protected function name(): Attribute
    {
        return Attribute::make(
            // get: fn ($value) => Str::kebab($value),
            get: fn ($value) => Str::lower($value),
            set: fn ($value) => Str::upper($value),
        );
    }

   

}
