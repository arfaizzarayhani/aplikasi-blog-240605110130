<form
method="POST"
action="/kategori/{{ $kategori->id }}">

@csrf
@method('PUT')

<input
type="text"
name="nama_kategori"
value="{{ $kategori->nama_kategori }}">

<button>

Update

</button>

</form>