<?php

namespace App\Models\Candidate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nominee\Nominee;


class Candidate extends Model
{
    use HasFactory;
    protected $table ="table_admin_candidate";
    
    public function getNomineedetails(){
        return $this->belongsTo(Nominee::class,'nomineeId','id');
    }

}