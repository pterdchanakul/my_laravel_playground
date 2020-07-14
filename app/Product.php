<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name',
        'atelectasis',
        'cardiomegaly',
        'effusion',
        'infiltration',
        'mass',
        'nodule',
        'pneumonia',
        'pneumothorax',
        'consolidation',
        'edema',
        'emphysema',
        'fibrosis',
        'pleural_thickening',
        'hernia',
        'no_finding'
    ];


}
