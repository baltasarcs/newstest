@extends('app')

@section('content')
    <div class="formnews">
    @if (isset($news->id))
        <form action="/news" method="PUT">
        <input type="hidden" name="id" value="{{ $news->id }}">
    @else
        <form action="/news" method="POST">
        <input type="hidden" name="id" value="">
    @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div>
                <label>Titulo </label></br>
                <input type="text" name="title" value="{{ $news->title?? '' }}" style="width: 500px;">
            </div>
            <div>
                <label>Noticia </label></br>
                <textarea name="description" cols="100" rows="10">{{ $news->description?? '' }}</textarea>
            </div>

            <div>
                <button type="submit" class="btn green">Gravar</button>
            </div>
        </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
@endsection
