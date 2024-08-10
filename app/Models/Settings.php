<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id',
		'title',
        'tag_line',
        'email',
		'cc_email',
		'bcc_email',
		'updated_by',
    ];
}
