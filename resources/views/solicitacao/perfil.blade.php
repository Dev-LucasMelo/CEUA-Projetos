<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Perfil</h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.perfil.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <h3 class="subtitulo">Tipo e Característica</h3>
            <div class="col-sm-6">
                <label for="grupo_animal">Grupo Animal:</label>
                <select class="form-control" id="grupo_animal" name="grupo_animal" onchange="unidades()">
                    <option disabled selected>Selecione o Grupo Animal</option>
                    <option value="anfibio">Anfíbio</option>
                    <option value="ave">Ave</option>
                    <option value="bovino">Bovino</option>
                    <option value="bubalino">Bubalino</option>
                    <option value="canino">Canino</option>
                    <option value="caprino">Caprino</option>
                    <option value="outro">Outro a especificar</option>
                    <option value="ovino">Ovino</option>
                    <option value="peixes">Peixes</option>
                    <option value="roedores">Roedores</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="linhagem">Linhagem:</label>
                <input class="form-control @error('linhagem') is-invalid @enderror" id="linhagem" type="text" name="linhagem" value="{{ old('linhagem') }}" required autocomplete="linhagem"
                       autofocus>
                @error('linhagem')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="idade">Idade:</label>
                <input class="form-control @error('idade') is-invalid @enderror" id="idade" type="text" name="idade" value="{{ old('idade') }}" required autocomplete="idade"
                       autofocus>
                @error('idade')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="peso">Peso Aproximado:</label>
                <input class="form-control @error('peso') is-invalid @enderror" id="peso" type="text" name="peso" value="{{ old('peso') }}" required autocomplete="peso"
                       autofocus>
                @error('peso')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div class="row mt-2">

            <div class="col-sm-4">
                <label for="machos">Quantidade de machos:</label>
                <input class="form-control @error('machos') is-invalid @enderror" id="machos" type="number" name="machos" value="{{ old('machos') }}" required autocomplete="machos"
                       autofocus>
                @error('machos')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="femeas">Quantidade de fêmeas:</label>
                <input class="form-control @error('femeas') is-invalid @enderror" id="femeas" type="number" name="femeas" value="{{ old('femeas') }}" required autocomplete="femeas"
                       autofocus>
                @error('femeas')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="quantidade">Quantidade:</label>
                <input class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" type="number" name="quantidade" value="{{ old('quantidade') }}" required autocomplete="quantidade"
                       autofocus>
                @error('quantidade')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        @include('component.botoes_form')
    </form>

</div>

