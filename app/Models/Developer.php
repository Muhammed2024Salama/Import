<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $preventsLazyLoading = true;

    /**
     * @var string
     */
    protected $table = 'developers';

    /**
     * @var string
     */
    protected $primaryKey = 'developer_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'website',
        'logo',
        'description',
        'status'
    ];

}
