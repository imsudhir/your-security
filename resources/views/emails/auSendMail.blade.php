{{-- @component('mail::message') --}}
@if ($details['brodcast']==1)
<h2>New jobs available</h2>
<b>Total Jobs: </b>{{$details['totaljobs']}}<br>
<b>Apply here: </b>{{$details['link']}}
{{-- @component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent --}}
<br>
<br>
Thanks,
<br>
<br>
{{ config('app.name') }}
@else
    
<h2>Your Login Creentials</h2>
<img src="https://cdn.templates.unlayer.com/assets/1597209249736-woman-traveler-looking-caldera-from-fira-thera-santorini-island-greece-tourism-traveling-vacation-concept_106029-1429.jpg">
<b>userid: </b>{{$details['userid']}}<br>
<b>password: </b>{{$details['password']}}
{{-- @component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent --}}
<br>
<br>
Thanks,
<br>
<br>
{{ config('app.name') }}
@endif

{{-- @endcomponent --}}
