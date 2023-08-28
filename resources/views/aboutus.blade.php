@extends('layouts.appAboutUs')

@section('content')
<div class="aboutUs">
    <div class="innerAboutUs">
        <div class="innerAboutUsTop">
            <div class="">
                <img src="{{ Storage::url('/img/' . 'suso8.jpg') }}" />
            </div>
        </div>
        <div class="innerAboutUsBottom">
            <div class="">
                <p class="">
                    SL Ocasión es una empresa fundada en Julio de 2021. Es el resultado de la experiencia de muchos años dedicándolos en exclusiva al trato directo con el cliente. Después de pasar por varios sectores, hemos juntado en nuestro pequeño local la pasión por los coches y nuestra experiencia laboral en asesoramiento de ventas.
                </p>
                <p class="">
                    Porque nos gusta sentir que nuestros clientes han elegido bien, te invito a que confíes en SL Ocasión si estás pensando en cambiar de coche.
                    <br><br>¡NOS GUSTA NUESTRO TRABAJO!
                </p>
            </div>
        </div>
    </div>
</div>
@endsection