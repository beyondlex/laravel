@component('mail::message')
# Introduction

Account created:

account: {{$admin->name}}
password: {{$admin->password}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
