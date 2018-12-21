<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Post extends Model
{
    protected $fillable = [
        'title', 'body','user_id'
    ];
	
	public function canUserEdit(){
		$currentUser = Auth::user();
		return ($currentUser->id==$this->user_id);
	}
	
	public function canUserDelete(){
		$currentUser = Auth::user();
		return ($currentUser->id==$this->user_id);
	}
}
