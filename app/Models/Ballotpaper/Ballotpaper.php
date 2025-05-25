<?php

namespace App\Models\Ballotpaper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nominee\Nominee;
use App\Models\Candidate\Candidate;
use App\Models\Members\Members;
class Ballotpaper extends Model
{
    use HasFactory;
    protected $table ="table_admin_ballotpaper";
   
    public function members() {
    return $this->belongsTo(Members::class, 'memberId');
}

}