@component('mail::message')
# Your Post Was Liked

{{$liker->name}} liked one your Posts

@component('mail::button', ['url' => url('post/'.$post.'/show')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
