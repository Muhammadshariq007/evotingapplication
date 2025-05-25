<?php

namespace App\Models\Members;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter\Chapter;
use App\Models\Ballotpaper\Ballotpaper;
use App\Models\Candidate\Candidate;

class Members extends Model
{
    use HasFactory;
    protected $fillable = [
        'memberName',
        'memberEmail',
        'memberMobile',
        'memberCity',
        'memberChapter',
        'status'
        // Add other attributes that should be mass assignable
    ];
    protected $table ="table_admin_members";
    
    public function getChapterdetails(){
        return $this->belongsTo(Chapter::class,'memberChapter','id');
    }
    
    public function ballotpapers()
    {
        return $this->hasMany(Ballotpaper::class, 'memberId', 'id');
    }
    
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidateId'); // Adjust if the column is different
    }

    
}