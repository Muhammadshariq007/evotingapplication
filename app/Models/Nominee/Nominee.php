<?php

namespace App\Models\Nominee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate\Candidate;

class Nominee extends Model
{
    use HasFactory;
    protected $table ="table_admin_nominee";
    
    public function getCandidatesdetails()
    {
        return $this->hasMany(Candidate::class,'nomineeId', 'id');
    }
    
}