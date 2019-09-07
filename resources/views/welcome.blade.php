@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><label>Categories List</label></div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                            <li class="list-group-item">
                                <div class="col-md-10 blogShort">
                                    <h1>{{ $category->title }}</h1>
                                    <article>
                                        <p>{{ $category->description }}</p>
                                    </article>
                                    <a class="btn btn-blog pull-right marginBottom10" href="{{route('singlecategory', $category->id)}}">RSS Feed</a> 
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <br>
                        {{ $categories->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection