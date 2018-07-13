<?php

use Faker\Factory as Faker;
use App\Models\produit;
use App\Repositories\produitRepository;

trait MakeproduitTrait
{
    /**
     * Create fake instance of produit and save it in database
     *
     * @param array $produitFields
     * @return produit
     */
    public function makeproduit($produitFields = [])
    {
        /** @var produitRepository $produitRepo */
        $produitRepo = App::make(produitRepository::class);
        $theme = $this->fakeproduitData($produitFields);
        return $produitRepo->create($theme);
    }

    /**
     * Get fake instance of produit
     *
     * @param array $produitFields
     * @return produit
     */
    public function fakeproduit($produitFields = [])
    {
        return new produit($this->fakeproduitData($produitFields));
    }

    /**
     * Get fake data of produit
     *
     * @param array $postFields
     * @return array
     */
    public function fakeproduitData($produitFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nom' => $fake->word,
            'quantite' => $fake->randomDigitNotNull,
            'prix' => $fake->randomDigitNotNull,
            'categorie' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $produitFields);
    }
}
