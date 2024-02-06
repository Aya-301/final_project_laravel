<x-mail::message>
Sender: {{$data['fname']}} {{$data['lname']}}<br>
Email: {{$data['email']}} <br><br>
Message: {{$data['message']}} <br>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.fname') }}
</x-mail::message>
