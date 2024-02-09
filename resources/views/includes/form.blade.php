<div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old("title", $book->title ?? null) }}" >
</div>
<div class="form-group">
    <label for="prix">Price:</label>
    <input type="number" class="form-control" id="prix" name="prix" value="{{ old("prix", $book->prix ?? null) }}" >
</div>
<div class="form-group">
    <label for="prix">quantite :</label>
    <input type="number" class="form-control" id="prix" name="prix" value="{{ old("prix", $book->prix ?? null) }}" >
</div>

@if($errors->any())
    <div class="alert alert-danger ">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
