@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="section section--xl">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card custom--card">
                        <div class="card-header">
                            <h5 class="card-title">@lang('Razorpay Payment')</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group text-center">
                                <li class="list-group-item d-flex justify-content-between">
                                    @lang('You have to pay '):
                                    <strong>
                                        {{ showAmount($deposit->final_amount, currencyFormat: false) }}
                                        {{ __($deposit->method_currency) }}
                                    </strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    @lang('You will get '):
                                    <strong>{{ showAmount($deposit->amount) }}</strong>
                                </li>
                            </ul>
                            <form action="{{ $data->url }}" method="{{ $data->method }}" class="disableSubmission">
                                <input type="hidden" custom="{{ $data->custom }}" name="hidden">
                                <script src="{{ $data->checkout_js }}"
                                    @foreach ($data->val as $key => $value) data-{{ $key }}="{{ $value }}" @endforeach></script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('input[type="submit"]').addClass("mt-4 btn btn--base w-100  btn--xl");
        })(jQuery);
    </script>
@endpush