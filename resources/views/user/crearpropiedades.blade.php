@extends('layouts.app')
@section('content')
    <div class="parent">
        <div class="izquierda">
            <a
                href="https://auth.mercadolibre.cl/authorization?response_type=code&client_id=2635352016401575&redirect_uri=http://localhost:8000/home">Dar
                permiso a la app</a>
            <a href="{{ route('token') }}">Generar token</a>
            <form action="{{ route('publicar') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="v//endedor">{{ __('Nombre del vendedor') }}</label>
                    <input type="text" class="form-control" name="vendedor" id="vendedor">
                </div>
                <div class="form-group">
                    <label for="info">{{ __('Informacion adicional') }}</label>
                    <textarea class="form-control" name="info" id="info"> </textarea>
                </div>
                <div class="form-group">
                    <label for="telefono">{{ __('Numero de telefono') }}</label>
                    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="12345678">
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Correo electronico') }}</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label style="margin-top: 20px" for="_Region" class="control-label">{{ __('Region') }}</label>
                    <select name="Region" id="_Region" class="form-control" required>
                        <option value="">---Selecciona una Opcion---</option>
                        @foreach ($region as $reg)
                            <option value="{{ $reg->code }}">{{ $reg->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label style="margin-top: 20px " for="Comuna" class="control-label">{{ __('Comuna') }}</label>
                    <select name="Comuna" id="_Comuna" class="form-control" required>
                    </select>
                </div>
                <div class="form-group">
                    <label style="margin-top: 20px " for="Barrio" class="control-label">{{ __('Barrio') }}</label>
                    <select name="Barrio" id="_Barrio" class="form-control" required>
                    </select>
                </div>
                <input type="text" id="_latitude" name="latitude" value="">
                <input type="text" id="_longitude" name="longitude" value="">
                <div class=" form-group">
                    <label for="direccion">{{ __('Direccion') }}</label>
                    <input type="text" class="form-control" name="direccion" id="direccion">
                </div>
                <div class="form-group" id="sources">
                    <button onclick="createInput(); return false;">Añadir foto</button>
                </div>
        </div>
        <div class="derecha">

            <div class="form-group">
                <label for="nombre" class="control-label">{{ __('Titulo de la propiedad') }}</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                    id="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="condicion" class="control-label">{{ __('Condicion') }}</label>
                <select name="condicion" id="condicion" class="form-control">
                    <option value="">---Selecciona una Opcion---</option>
                    <option value="new">{{ __('Nueva') }}</option>
                    <option value="used">{{ __('Usada') }}</option>
                    <option value="not_specified">{{ __('No especifica') }}</option>
                </select>
                @error('condicion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="venta" class="control-label">{{ __('Valor de venta') }}</label>
                <input type="number" class="form-control @error('venta') is-invalid @enderror" min="15000000"
                    name="venta" id="venta" value="{{ old('venta') }}">
                @error('venta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="baños" class="control-label">{{ __('Cantidad de baños') }}</label>
                <input type="number" class="form-control @error('baños') is-invalid @enderror" name="baños"
                    id="baños" value="{{ old('baños') }}">
                @error('baños')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="piezas" class="control-label">{{ __('Cantidad de piezas') }}</label>
                <input type="number" class="form-control @error('piezas') is-invalid @enderror" name="piezas"
                    id="piezas" value="{{ old('piezas') }}">
                @error('piezas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="dormitorios" class="control-label">{{ __('Cantidad de dormitorios') }}</label>
                <input type="number" class="form-control @error('dormitorios') is-invalid @enderror" name="dormitorios"
                    id="dormitorios" value="{{ old('dormitorios') }}">
                @error('dormitorios')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="estacionamiento" class="control-label">{{ __('Cantidad de estacionamiento') }}</label>
                <input type="number" class="form-control @error('estacionamiento') is-invalid @enderror"
                    name="estacionamiento" id="estacionamiento" value="{{ old('estacionamiento') }}">
                @error('estacionamiento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="construido"
                    class="control-label">{{ __('Cantidad de metros cuadrados construidos') }}</label>
                <input type="number" class="form-control @error('construido') is-invalid @enderror" name="construido"
                    id="construido" value="{{ old('construido') }}">
                @error('construido')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="terreno" class="control-label">{{ __('Cantidad de metros cuadrados de terreno') }}</label>
                <input type="number" class="form-control @error('terreno') is-invalid @enderror" name="terreno"
                    id="terreno" value="{{ old('terreno') }}">
                @error('terreno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="submit" class="btn btn-success" value="publicar propiedad">
            <a href="{{ url('/mispropiedades') }}" class="btn btn-primary">Regresar</a>
            </form>
        </div>
    </div>
    <script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        document.getElementById('_Region').addEventListener('change', (e) => {
            fetch('comunas', {
                method: 'POST',
                body: JSON.stringify({
                    region: e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "<option value=''> Elegir</option>"

                for (let i in data.lista) {
                    opciones += '<option value ="' + data.lista[i].id + '">' + data.lista[i]
                        .name + '</option>';
                }
                document.getElementById("_Comuna").innerHTML = opciones;
            }).catch(error => console.error(error));
        })
        document.getElementById('_Comuna').addEventListener('change', (e) => {
            fetch('barrios', {
                method: 'POST',
                body: JSON.stringify({
                    comuna: e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "<option value=''> Elegir</option>"

                for (let i in data.lista) {
                    opciones += '<option value ="' + data.lista[i].id + '">' + data.lista[i]
                        .name + '</option>'; //
                }
                document.getElementById("_Barrio").innerHTML = opciones;
            }).catch(error => console.error(error));
        })
        document.getElementById('_Barrio').addEventListener('change', (e) => {
            fetch('location', {
                method: 'POST',
                body: JSON.stringify({
                    barrio: e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                document.getElementById("_latitude").value = data.lista.latitude;
                document.getElementById("_longitude").value = data.lista.longitude;
            }).catch(error => console.error(error));
        })
        let count = 0;

        function createInput() {
            if (count < 6) {
                count++;
                var sources = document.getElementById("sources");
                var input = document.createElement("input");
                input.type = "text";
                input.setAttribute("style", "margin-top: 10px;");
                input.class = "form-control";
                input.id = "";
                input.name = "source[]";
                input.placeholder =
                    "https://empresas.blogthinkbig.com/wp-content/uploads/2019/11/Imagen3-245003649.jpg?w=800";
                sources.appendChild(input);

            }

        }
    </script>
@endsection
<style>
    .parent {
        display: grid;
        grid-template-columns: repeat(9, 1fr);
        grid-template-rows: repeat(8, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
    }

    .derecha {
        grid-area: 2 / 6 / 8 / 9;
    }

    .izquierda {
        grid-area: 2 / 2 / 8 / 4;
    }

    #sources {
        display: block;
        width: 100%;
    }

    input[type=text] {
        width: 100%;
    }
</style>
