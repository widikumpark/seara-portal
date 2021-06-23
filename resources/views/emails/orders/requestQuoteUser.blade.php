@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '{{config('app.url')}}'.'/view-quote'.'/'.'{{$quote["number"]}}'])
View Quote
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
