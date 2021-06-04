@extends('app')

@section('content')
    <main class="main-area">
        <div class="centered">
            <section class="cards">
            @foreach ($news as $new)
                <article class="card">
                    <a href="{{ URL::to('news/'.$new->id.'/edit') }}">
                        <div class="card-content">
                            <h2 class="titulo">{{ $new->title }}</h2>
                            <p class="description">{{ $new->description }}</p>
                        </div>
                        <div class="show">
                            <button type="button" class="btn green">Acessar</button>
                        </div>
                    </a>
                </article>
            @endforeach
            </section>
        </div>
    </main>
@endsection
