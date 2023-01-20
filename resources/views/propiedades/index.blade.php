@extends('layouts.app')

@section('content')

    <body>
        <div class="container">
            @include('mensajes.propiedades')
            <div class="buscador">
                <input name="" id="buscador" class="form-control search-box" type="search" placeholder=""
                    aria-label="Search" value="">
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            {{ __('Nombre de la propiedad') }}
                        </th>
                        <th>
                            {{ __('Valor de arriendo') }}
                        </th>
                        <th>
                            {{ __('Valor de venta') }}
                        </th>
                        <th>
                            {{ __('Estado de propiedad') }}
                        </th>
                        <th>
                            {{ __('Tipo de propiedad') }}
                        </th>
                        <th>
                            {{ __('Cantidad de baños') }}
                        </th>
                        <th>
                            {{ __('Metros cuadrados construidos') }}
                        </th>
                        <th>
                            {{ __('Metros cuadrados de terreno') }}
                        </th>
                    </tr>
                </thead>
                <tbody id="buscar">
                    @foreach ($propiedades as $p)
                        <tr>
                            <td>
                                {{ $p->nombre }}
                            </td>
                            <td>
                                ${{ number_format($p->arriendo, 0, '', '.') }}
                            </td>
                            <td>
                                ${{ number_format($p->venta, 0, '', '.') }}
                            </td>
                            <td>
                                {{ $p->estado }}
                            </td>
                            <td>
                                {{ $p->tipo }}
                            </td>
                            <td>
                                {{ $p->baños }}
                            </td>
                            <td>
                                {{ $p->construido }}
                            </td>
                            <td>
                                {{ $p->terreno }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            $("#buscador").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#buscar tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
