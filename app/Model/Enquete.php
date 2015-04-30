<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    protected $table = 'enquetes';

    protected $fillable = ['nome', 'ativa'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function perguntas()
    {
        return $this->hasMany('App\Model\Pergunta');
    }
}
