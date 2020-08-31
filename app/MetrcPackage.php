<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class MetrcPackage extends Model
{
    use Searchable;
    protected $table = 'metrc_packages';

}
