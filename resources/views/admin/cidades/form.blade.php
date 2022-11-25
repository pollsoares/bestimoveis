@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">
        {{--Erros no topo do form como lista}}
        {{--@if ($errors->any())
            <div class="red-text" >
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif --}}

        <form action="{{$action}}" method="POST"> {{-- Na inclusão --}}
            {{--Cross-site Request Forgery csrf - Prevenção de ataques de request forgery --}}
            @csrf
            @isset($cidade) {{--Na edição sobrescreve o methodo POST--}}
            @method('PUT')
            @endisset

            <div class="input-field">
                {{--O Value old, mantem a escrita quando há uma validação para que não seja necessário uma nova digitação --}}
                <input type="text" name="nome" id="nome" value="{{old('nome', $cidade->nome ?? '' )}}"/>
                <label for="nome">Nome</label>
                {{--Erros para cada campo em especificifico--}}
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{route('admin.cidades.listar')}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>

        </form>
    </section>

@endsection
