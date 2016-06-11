@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">All Pages</div>

        <div class="panel-body">
          @foreach ($pages as $page)
            <div class="page row">
            <a href="{{ URL('pages/'.$page->id) }}" target="_blank">
              <h4>{{ $page->title }}</h4>
              </a>

            <a href="{{ URL('admin/pages/'.$page->id.'/edit') }}" class="btn btn-success">Edit</a>

            <form action="{{ URL('admin/pages/'.$page->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
                        <hr>
          @endforeach

        </div>
      </div>
    </div>

        <div class="col-md-6 col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">All Articles</div>

            <div class="panel-body">
              @foreach ($articles as $article)
                <div class="page">
                <a href="{{ URL('articles/'.$article->id) }}" target="_blank">
                  <h4>{{ $article->title }}</h4>
                  </a>

                <a href="{{ URL('admin/articles/'.$article->id.'/edit') }}" class="btn btn-success">Edit</a>

                <form action="{{ URL('admin/articles/'.$article->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
                                <hr>
              @endforeach

            </div>
          </div>
        </div>
  </div>
</div>
@endsection