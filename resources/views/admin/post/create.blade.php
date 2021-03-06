@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Crea un nuovo post</h1>

                <form method="POST" action={{route('admin.posts.store')}}>

                    @csrf

                    {{-- Sezione delle varie categorie di alimenti --}}
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="form-control" id="category_id" name="category_id">

                            <option value="">Altro</option>

                            @foreach ($categories as $category)
                                <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    {{-- Sezione in cui andrà inserito il titolo --}}
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div>

                    {{-- Contenuto/descrizione del post --}}
                    <div class="form-group">
                        <label for="content">Contenuto del post</label>
                        <textarea class="form-control" id="content" rows="10" name="content">{{ old('content') }}</textarea>
                    </div>

                    {{-- Checkbox dei vari tag --}}
                    @foreach ($tags as $tag)
                        <div class="custom-control custom-checkbox">
                            <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value={{$tag->id}} {{in_array(   $tag->id,    old('tags', [])   )?'checked':''}}>
                            <label class="custom-control-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach


                    <button type="submit" class="btn btn-success">Salva</button>

                </form>
                <a href="{{url()->previous()}}" class="btn btn-primary mt-3">Torna alla lista dei prodotti</a>
            </div>
        </div>
    </div>
@endsection
