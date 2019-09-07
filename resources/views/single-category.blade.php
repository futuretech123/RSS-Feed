@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header"><label>RSS Feed List of {{$category->title}}</label></div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @if(!$feeds->isEmpty())
                                        @foreach ($feeds as $feed)
                                            <a href="{{ $feed->rss }}"><li class="list-group-item">{{ $feed->rss }}</li></a>
                                        @endforeach
                                    @else
                                        No RSS Feed Found.
                                    @endif
                                </ul>
                                <br>
                                {{ $feeds->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection