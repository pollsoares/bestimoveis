@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <table class="highligth">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade }}</td>
                        <td class="right-align">Excluir - Remover</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Não exixtem cidades cadastradas</td>
                        <td>Excluir - Remover</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
