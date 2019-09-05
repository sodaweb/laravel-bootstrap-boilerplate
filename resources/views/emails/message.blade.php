@component('mail::message')
# Message Received

You received a message from {{ config('app.name') }} site:

@component('mail::table')
|                     |              |
| -------------------:|:-------------|
| **Name**:&nbsp;     | {{ $name }}  |
| **Phone**:&nbsp; | {{ $phone }} |
| **E-mail**:&nbsp;   | {{ $email }} |
@endcomponent

@component('mail::panel')
	@foreach ($messageLines as $messageLine)
		{{ $messageLine }}<br />
	@endforeach
@endcomponent

@component('mail::button', ['url' => 'mailto:'. $email])
Reply via e-mail
@endcomponent



<small>This e-mail was sent automatically and should not be replied. To reply the sender, click on the button above or send and e-mail to {{ $email }}.</small>
@endcomponent
