<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $table = 'perguntas';

    protected $fillable = ['nome', 'enquete_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function enquete()
    {
        return $this->belongsTo('App\Model\Enquete');
    }

    public function respostas()
    {
        return $this->hasMany('App\Model\Resposta');
    }
}
