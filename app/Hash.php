<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hash extends Model {
    public $timestamps = false;
    protected $fillable = ['word_id', 'hash', 'word', 'algorithm', 'user_id'];

}
