@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header"><label>Categories List</label><span class="text-right" style="float: right;"><a href="{{route('category')}}" class="btn btn-primary">Add Category</a></span></div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td width="15%">
                                                {{ $category->title }}
                                            </td>
                                            <td width="50%">
                                                {{ $category->description }}
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('category.delete', $category->id)}}" onsubmit="return ConfirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                    <a href="{{route('rssfeedform', $category->id)}}" class="btn btn-primary">Add RSS</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function ConfirmDelete(){
    var x = confirm("Are you sure you want to delete this Category? If the category will be deleted then all the rss related to this category will be deleted.");
    if (x)
      return true;
    else
      return false;
  }
</script>
@endsection
