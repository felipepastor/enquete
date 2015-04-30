<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $table = 'respostas';

    protected $fillable = ['nome', 'pergunta_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function pergunta()
    {
        return $this->belongsTo('App\Model\Pergunta');
    }

    public function avaliacoes()
    {
        return $this->hasMany('App\Model\Avaliacao');
    }
}
