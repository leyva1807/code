@php
    $registrationDisabled = getContent('register_disable.content',true);
@endphp
<div class="section">
    <div class="register-disable">
        <div class="container text-center">
            <div class="register-disable-image">
                <img class="fit-image" src="{{ frontendImage('register_disable',@$registrationDisabled->data_values->image,'280x280') }}" alt="register disable image">
            </div>
            <h5 class="register-disable-title">{{ __(@$registrationDisabled->data_values->heading) }}</h5>
            <p class="register-disable-desc">
                {{ __(@$registrationDisabled->data_values->subheading) }}
            </p>
        </div>
    </div>
</div>
