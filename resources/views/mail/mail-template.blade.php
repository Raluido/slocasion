<ul style="list-style-type:none">
    @if($name)
        <li>
            <strong>{{ $name }}</strong>
        </li>
    @endif
    @if($phone)
        <li>
            <strong>{{ $phone }}</strong>
        </li>
    @endif
    @if($email)
        <li>
            <strong>{{ $email }}</strong>
        </li>
    @endif
</ul>
<hr>
@if($messageLines)
    <h4>
        Message:
    </h4>
    <p>
        @foreach ($messageLines as $messageLine)
            {{ $messageLine }}<br>
        @endforeach
    </p>
    <hr>
@endif
