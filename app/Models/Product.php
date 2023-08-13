<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $appends = [
        'photo',
    ];
    protected $casts = [
        'size' => 'array',
    ];
    const SIZE_SELECT = [
        '0' => 'Small',
        '1' => 'Medium',
        '2' => 'Large',
        '3' => 'Extra Large',
    ];
    protected $fillable = [
        'category_id',
        'name',
        'size',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'featured',
        'status',
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(50)
              ->height(50)
              ->sharpen(10);
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->first();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;

    }

    public function getImagesAttribute()
    {
        return $this->getMedia('photo');

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');;
    }
}
