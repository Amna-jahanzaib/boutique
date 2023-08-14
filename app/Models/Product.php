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
        'customization'=>'array',
    ];
    const SIZE_SELECT = [
        '0' => 'Small',
        '1' => 'Medium',
        '2' => 'Large',
        '3' => 'Extra Large',
    ];

    const CUSTOM_SELECT = [
        'add_sleeve' => 'Sleeves',
        'top_length' => 'Top Length',
        'bottom_length' => 'Bottom Length',
        'add_dupatta' => 'Dupatta',
        'add_trousers' => 'Trousers',
        'choli_length' => 'Choli Length',
        'saree_length' => 'Saree Length',
        'add_lining' => 'Lining',

    ];


    const SAREE_LENGTH_SELECT = [
        '40' => '40 inches',
        '41' => '41 inches',
        '42' => '42 inches',
        '43' => '43 inches',
        '44' => '44 inches',
        '45' => '45 inches',
        ];
    
    const ADD_SLEEEVE_SELECT = [
        'full' => 'Full Sleeves',
        'sleeveless' => 'Sleeveless',
        'half' => 'Half Sleeves',
        'three_quarters' => 'Three-Quarters Sleeves',
        'churidar_sleeves' => 'Churidar Sleeves',
    ];

    const ADD_DUPATTA_SELECT = [
        'dupatta' => 'Dupatta',
        'no_dupatta' => 'No Dupatta',
    ];

    const ADD_LINING_SELECT = [
        'full_suit' => 'Full Lining including sleeves',
    ];
    const ADD_TROUSERS_SELECT = [
        'churidar' => 'Churidar',
        'straigth' => 'Straigth Pant',
        'pajama' => 'Pajama',
    ];

    const TOP_LENGTH_SELECT = [
        '28' => '28 inches',
        '29' => '29 inches',
        '30' => '30 inches',
        '31' => '31 inches',
        '32' => '32 inches',
        '33' => '33 inches',
        '34' => '34 inches',
        '35' => '35 inches',
        '36' => '36 inches',
        '37' => '37 inches',
        '38' => '38 inches',
        '39' => '39 inches',
        '40' => '40 inches',
        '41' => '41 inches',
        '42' => '42 inches',
    ];

    const BOTTOM_LENGTH_SELECT = [
        '33' => '33 inches',
        '34' => '34 inches',
        '35' => '35 inches',
        '36' => '36 inches',
        '37' => '37 inches',
        '38' => '38 inches',
        '39' => '39 inches',
        '40' => '40 inches',
        '41' => '41 inches',
        '42' => '42 inches',
        '43' => '43 inches',
        '44' => '44 inches',
        '45' => '45 inches',
        '46' => '46 inches',
        '47' => '47 inches',
        '48' => '48 inches',
        '49' => '49 inches',
        '50' => '50 inches',
    ];

    const CHOLI_LENGTH_SELECT = [
        '14' => '14 inches',
        '14.5' => '14.5 inches',
        '15' => '15.5 inches',
        '15.5' => '15.5 inches',
        '16' => '16 inches',
        '16.5' => '16.5 inches',
        '17' => '17 inches',
        '17.5' => '17.5 inches',

    ];

    const OPTION_SELECT = [
        'full' => 'Full Sleeves',
        'sleeveless' => 'Sleeveless',
        'half' => 'Half Sleeves',
        'three_quarters' => 'Three-Quarters Sleeves',
        'churidar_sleeves' => 'Churidar Sleeves',
        'churidar' => 'Churidar',
        'straigth' => 'Straigth Pant',
        'dupatta' => 'Dupatta',
        'full_suit' => 'Full Lining including sleeves',
        'pajama' => 'Pajama',
        '14' => '14 inches',
        '14.5' => '14.5 inches',
        '15' => '15.5 inches',
        '15.5' => '15.5 inches',
        '16' => '16 inches',
        '16.5' => '16.5 inches',
        '17' => '17 inches',
        '17.5' => '17.5 inches',
        '28' => '28 inches',
        '29' => '29 inches',
        '30' => '30 inches',
        '31' => '31 inches',
        '32' => '32 inches',
        '33' => '33 inches',
        '34' => '34 inches',
        '35' => '35 inches',
        '36' => '36 inches',
        '37' => '37 inches',
        '38' => '38 inches',
        '39' => '39 inches',
        '40' => '40 inches',
        '41' => '41 inches',
        '42' => '42 inches',
        '43' => '43 inches',
        '44' => '44 inches',
        '45' => '45 inches',
        '46' => '46 inches',
        '47' => '47 inches',
        '48' => '48 inches',
        '49' => '49 inches',
        '50' => '50 inches',
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
        'customization',
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
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price', 'customization', 'size');;
    }
}
