<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $produit->id !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $produit->nom !!}</p>
</div>

<!-- Quantite Field -->
<div class="form-group">
    {!! Form::label('quantite', 'Quantite:') !!}
    <p>{!! $produit->quantite !!}</p>
</div>

<!-- Prix Field -->
<div class="form-group">
    {!! Form::label('prix', 'Prix:') !!}
    <p>{!! $produit->prix !!}</p>
</div>

<!-- Categorie Field -->
<div class="form-group">
    {!! Form::label('categorie', 'Categorie:') !!}
    <p>{!! $produit->categorie !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $produit->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $produit->updated_at !!}</p>
</div>

