<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-7WU6yNvVig83CLzX2u04G/DRxnZaUc7I/k1n9fMQsf0C5DyvFUwyrz0fzzHX0ONZc5bZk5B5cpKNYQh+8RtPTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    </head>
    @include('partials.head')
    <body>
        @include('partials.menu')
        <main class="container">
          <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <div class="col-md-12 px-0">
              <h1 class="display-4 fst-italic">{{ $news->title }}</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
                <img class="bd-placeholder-img" width="200" height="250" src="{{ $news->image_url }}">
            </div>
            <div class="col-md-8">
                <p class="card-text mb-auto">{{ $news->text }} </p>
            </div>
          </div>
          <div class="row">
            <p class="h3" style="text-align: center; margin-top:20px;">Comments</p>
            @foreach($news->comments as $comment)
            <div class="col-md-12">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">{{ $comment->user->name }}</strong>
                  <div class="mb-1 text-muted">{{ $comment->created_at->diffForHumans() }}</div>
                  <p>{{ $comment->comment }}</p>
                </div>
                <!-- like -->
                @if(Session::get('logged'))
                  <form action="{{ route('like') }}" method="POST">
                    <label for="like-button"><i class="fas fa-thumbs-up"></i></label>
                    <input type="button" id="like" value="like-button">
                    <input type="hidden" id="news_id" name="news_id" value="{{ $news->id }}"/>
                    <input type="hidden" id="comment_id" name="comment_id" value="{{ $comment->id }}"/>
                  </form>
                @endif
              </div>
            </div>
            @endforeach
            @if(Session::get('logged'))
              @include('partials.comment')
            @endif
          </div>
        </main>

        @include('partials.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
