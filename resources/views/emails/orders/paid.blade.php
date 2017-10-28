@component('mail::message')
# Introduction

Order paid:{{$order->order_no}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
