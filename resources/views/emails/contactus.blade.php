@component('mail::message')
    <p>You are receiving this email because someone try to message you.</p>
    <p>Email purpose <b>{{$contact->subject}} </b></p>
    <p>Message<b> {{$contact->message}} </b></p>
    <p>User Email <b>{{$user->email}}</b></p>
@endcomponent

