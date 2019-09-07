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
                        <div class="card-header">New RSS Feed For {{$category->title}}</div>
                        <div class="card-body">
                          <form method="POST" action="{{ route('addrssfeed', $category->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="link">RSS Feed Link</label>
                                <input id="link" name="link" type="text" maxlength="255" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" autocomplete="off" />
                                @if ($errors->has('link'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card">
                        <div class="card-header">RSS Feed Of {{$category->title}} Category</div>
                        <div class="card-body">
                          <table class="table table-striped">
                            @foreach ($feeds as $feed)
                              <tr>
                                <td>
                                  {{ $feed->rss }}
                                </td>
                                <td class="text-right">
                                    <form method="POST" action="{{route('feed.delete', [$category->id, $feed->id])}}" onsubmit="return ConfirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                          </table>
                          {{ $feeds->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function ConfirmDelete(){
        var x = confirm("Are you sure you want to delete this RSS Feed?");
        if (x)
          return true;
        else
          return false;
    }
</script>

@endsection
