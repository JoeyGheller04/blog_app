<div class="container">
  <h2>Commenta!</h2>
  <form action="{{ route('partials.comment') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="comment">Commento:</label>
      <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Inserisci il tuo commento" required></textarea>
      <input type="hidden" id="news_id" name="news_id" value="{{ $news->id }}"/>
    </div>
    <button type="submit" class="btn btn-primary">Invia</button>
  </form>
  <hr>
</div>