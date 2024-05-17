<form action="{{ route('comics.destroy', $comic) }}"
      method="POST"
      onsubmit="return confirm('Sicuro di voler eliminare {{ $comic->title }}?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
</form>
