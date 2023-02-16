<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

          <div>
            <div>Commenti</div>
            @for($i=0; $i<count($news->comments); $i++)
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <h5>{{ $news->comments[$i]->user->name }}</h5>
                <p>{{ $news->comments[$i]->comment }}</p>
                <p>{{ $news->comments[$i]->created_at->diffForHumans()}}</p>
            </div>
            @endfor
          </div>
        </main>

        @include('partials.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      </body>
</html>
