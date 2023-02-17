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
            <hr>
            @for($i=0; $i<count($news->comments); $i++)
              <div class="row d-flex justify-content-center" style="padding: 10px;">
                <div class="col-md-8 col-lg-6">
                  <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">
                      <div class="card mb-4">
                        <div class="card-body">
                          <p>{{ $news->comments[$i]->comment }}</p>
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center justify-content-between" style="width: 100%">
                              <div class="d-flex flex-row align-items-center">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25" height="25"/>
                                <p class="small mb-0 ms-2">{{ $news->comments[$i]->user->name }}</p>
                              </div>                            
                              <div >
                                <p class="small mb-0 ms-2" >{{ $news->comments[$i]->created_at->diffForHumans()}}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endfor
          </div>
        </main>

        @include('partials.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      </body>
</html>
