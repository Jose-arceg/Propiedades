@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('/propiedades') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nombre" class="control-label">{{ __('Nombre')}}</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                    name="nombre" id="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="arriendo" class="control-label">{{__('Valor de arriendo')}}</label>
                <input type="number" class="form-control @error('arriendo') is-invalid @enderror"
                    name="arriendo" id="arriendo" value="{{ old('arriendo') }}">
                @error('arriendo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="venta" class="control-label">{{__('Valor de venta')}}</label>
                <input type="number" class="form-control @error('venta') is-invalid @enderror"
                    name="venta" id="venta" value="{{ old('venta') }}">
                @error('venta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipo" class="control-label">{{__('Tipo de propiedad')}}</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="">---Selecciona una Opcion---</option>
                    <option value="Casa">{{ __('Casa') }}</option>
                    <option value="Departamento">{{ __('Departamento') }}</option>
                    <option value="Oficina">{{ __('Oficina') }}</option>
                </select>
                @error('tipo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="baños" class="control-label">{{ __('Cantidad de baños')}}</label>
                <input type="number" class="form-control @error('baños') is-invalid @enderror"
                    name="baños" id="baños" value="{{ old('baños') }}">
                @error('baños')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="construido" class="control-label">{{ __('Cantidad de metros cuadrados construidos')}}</label>
                <input type="number" class="form-control @error('construido') is-invalid @enderror"
                    name="construido" id="construido" value="{{ old('construido') }}">
                @error('construido')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="terreno" class="control-label">{{ __('Cantidad de metros cuadrados de terreno')}}</label>
                <input type="number" class="form-control @error('terreno') is-invalid @enderror" name="terreno"
                    id="terreno" value="{{ old('terreno') }}">
                @error('terreno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="submit" class="btn btn-success" value="Agregar producto">
            <a href="{{ url('productos') }}" class="btn btn-primary">Regresar</a>
        </form>
    </div>
@endsection