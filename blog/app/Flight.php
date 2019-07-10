<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    protected $table = 'recorddata';
    protected $fillable = ['username','title','user_id','userID','dataID','startTime','starthour','endTime','endhour','content_2','file','remind'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
