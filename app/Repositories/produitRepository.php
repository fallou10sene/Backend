<?php

namespace App\Repositories;

use App\Models\produit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class produitRepository
 * @package App\Repositories
 * @version July 12, 2018, 4:09 pm UTC
 *
 * @method produit findWithoutFail($id, $columns = ['*'])
 * @method produit find($id, $columns = ['*'])
 * @method produit first($columns = ['*'])
*/
class produitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'quantite',
        'prix',
        'categorie'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return produit::class;
    }
}
