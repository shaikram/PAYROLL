@component('mail::message')
# Hi {{ $data['username'] }}, Good day!

{{-- The body of your message. --}}
<p>
  Welcome to the ShowForce Security Agency(SSA)! We are excited to discuss your question about our company.
  We know you're going to be a valuable asset or client to our company and are looking forward to the positive impact you're going to have here.
  We're kindly asking for your patience to get back to you.
</p>
<center>
  <img src="{{asset('images/SFSA_LOGO.png')}}" width="200px" height="auto">
</center>

<br><br><br><br>
Sincerely yours,<br>
ShowForce Security Agency
{{-- {{ config('app.name') }} --}}
@component('mail::button', ['url' => 'http://showforcesecurityagency.epizy.com/'])
Click here to go to our Website
@endcomponent

@endcomponent
<br><br>
