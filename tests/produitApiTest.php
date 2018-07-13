<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class produitApiTest extends TestCase
{
    use MakeproduitTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateproduit()
    {
        $produit = $this->fakeproduitData();
        $this->json('POST', '/api/v1/produits', $produit);

        $this->assertApiResponse($produit);
    }

    /**
     * @test
     */
    public function testReadproduit()
    {
        $produit = $this->makeproduit();
        $this->json('GET', '/api/v1/produits/'.$produit->id);

        $this->assertApiResponse($produit->toArray());
    }

    /**
     * @test
     */
    public function testUpdateproduit()
    {
        $produit = $this->makeproduit();
        $editedproduit = $this->fakeproduitData();

        $this->json('PUT', '/api/v1/produits/'.$produit->id, $editedproduit);

        $this->assertApiResponse($editedproduit);
    }

    /**
     * @test
     */
    public function testDeleteproduit()
    {
        $produit = $this->makeproduit();
        $this->json('DELETE', '/api/v1/produits/'.$produit->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/produits/'.$produit->id);

        $this->assertResponseStatus(404);
    }
}
