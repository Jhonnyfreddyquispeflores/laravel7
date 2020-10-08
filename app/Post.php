<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use \Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    const CREATED_AT='fecha_creacion';
    const UPDATED_AT='fecha_actualizacion';
    
//    use SoftDeletes;
    
//    protected $date=['fecha_borrado'];
    
    protected $table = 'posts';
    protected $primaryKey = 'id_post';
    protected $fillable = ['titulo','contenido','id_autor'];
    
    public function autor(){
        return $this->belongsTo('App\User', 'id_autor');
    }
}
