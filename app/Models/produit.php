<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class produit
 * @package App\Models
 * @version July 12, 2018, 4:09 pm UTC
 *
 * @property string nom
 * @property integer quantite
 * @property integer prix
 * @property string categorie
 */
class produit extends Model
{
    use SoftDeletes;

    public $table = 'produits';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'quantite',
        'prix',
        'categorie'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'quantite' => 'integer',
        'prix' => 'integer',
        'categorie' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|max:255',
        'quantite' => 'required|numeric',
        'prix' => 'required|numeric',
        'categorie' => 'required|max:255'
    ];

    
}
