<h1>nova duvidas</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
    
@endif

<form action="{{ route('supports.store')}}" method="POST">
    <input type="text" placeholder="Assunto" name="subject" value="{{old('subject')}}">
    @csrf
    <textarea name="body" id="30" rows="5" placeholder="Descricao">{{old('body')}}</textarea>
    <button type="submit"> Enviar </button>
</form>