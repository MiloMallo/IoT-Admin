<?php

namespace App;

use App\Repositories\TypeConversionRepository;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = [
        'areaId', 'repertoryId', 'readerId',
    ];
    private $typeConv;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->typeConv = new TypeConversionRepository();
    }
}
