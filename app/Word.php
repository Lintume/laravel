<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model {
    public $timestamps = false;
   // protected $fillable = ['word'];

	public function hashes()
    {
        $hashes = [
            "sha1" => sha1($this->word),
            "md5" => md5($this->word),
            "base64" => base64_encode($this->word),
            "bcrypt" => bcrypt($this->word),
            "whirlpool" => hash ('whirlpool', $this->word)
        ];
        return $hashes;
    }

}
