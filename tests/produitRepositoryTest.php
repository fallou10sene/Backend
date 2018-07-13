<?php

use App\Models\produit;
use App\Repositories\produitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class produitRepositoryTest extends TestCase
{
    use MakeproduitTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var produitRepository
     */
    protected $produitRepo;

    public function setUp()
    {
        parent::setUp();
        $this->produitRepo = App::make(produitRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateproduit()
    {
        $produit = $this->fakeproduitData();
        $createdproduit = $this->produitRepo->create($produit);
        $createdproduit = $createdproduit->toArray();
        $this->assertArrayHasKey('id', $createdproduit);
        $this->assertNotNull($createdproduit['id'], 'Created produit must have id specified');
        $this->assertNotNull(produit::find($createdproduit['id']), 'produit with given id must be in DB');
        $this->assertModelData($produit, $createdproduit);
    }

    /**
     * @test read
     */
    public function testReadproduit()
    {
        $produit = $this->makeproduit();
        $dbproduit = $this->produitRepo->find($produit->id);
        $dbproduit = $dbproduit->toArray();
        $this->assertModelData($produit->toArray(), $dbproduit);
    }

    /**
     * @test update
     */
    public function testUpdateproduit()
    {
        $produit = $this->makeproduit();
        $fakeproduit = $this->fakeproduitData();
        $updatedproduit = $this->produitRepo->update($fakeproduit, $produit->id);
        $this->assertModelData($fakeproduit, $updatedproduit->toArray());
        $dbproduit = $this->produitRepo->find($produit->id);
        $this->assertModelData($fakeproduit, $dbproduit->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteproduit()
    {
        $produit = $this->makeproduit();
        $resp = $this->produitRepo->delete($produit->id);
        $this->assertTrue($resp);
        $this->assertNull(produit::find($produit->id), 'produit should not exist in DB');
    }
}
