@extends('layouts.appAboutUs')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="d-flex d-md-block justify-content-center mb-5">
                    <img src="{{ Storage::url('/img/' . 'suso8.jpg') }}" width="70%" />
                </div>
            </div>
            <div class="col-12 col-md-6 aboutUs mx-auto">
                <div class="">
                     <p class="fs-5">
                      SL Ocasión es una empresa fundada en Julio de 2021.  Es el resultado de la experiencia de muchos años dedicándolos en exclusiva al trato directo con el cliente. Después de pasar por varios sectores, hemos juntado en nuestro pequeño local la pasión por los coches y nuestra experiencia laboral en asesoramiento de ventas.
                    </p>
                    <p class="fs-5">
                        Porque nos gusta sentir que nuestros clientes han elegido bien, te invito a que confíes en SL Ocasión si estás pensando en cambiar de coche.
<br><br>¡NOS GUSTA NUESTRO TRABAJO!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

