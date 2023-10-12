@if(Session::get('errors'))
@foreach($errors->getMessages() as $message)
<p class="">{{ $message[0] }}</p>
@endforeach
@elseif (Session::get('success'))
{{ Session::get('success') }}
@endif