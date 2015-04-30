<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacao';

    protected $fillable = ['resposta_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function resposta()
    {
        return $this->belongsTo('App\Model\Resposta');
    }
}
