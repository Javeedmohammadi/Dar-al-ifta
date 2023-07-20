<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class person extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'person_full_name',
        'person_father_name',
        'person_phone',
        'person_email',
        'person_question'            
    ];

    public function persondetail () {
        return $this -> 
            hasOne(person_detail::class, 'person_id', 'id');
    }

}
