@component('mail::message')
Hello {{$user->name}}

Thank for login

Login at : {{now()->isoFormat('LLLL')}} (UTC)

@endcomponent
