<h1>Detalhes da duvida {{ $support->id }}</h1>
<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descricão: {{ $support->body }}</li>

    <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
        @csrf()
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>
</ul>