<div class="card custom--card mb-4">
    <div class="card-body">
        <div class="widget-card-inner">
            <div class="widget-card bg--success">
                <a href="{{ url()->route("admin.$type.successful", request()->all()) }}" class="widget-card-link"></a>
                <div class="widget-card-left">
                    <div class="widget-card-icon">
                        <i class="las la-check-circle"></i>
                    </div>
                    <div class="widget-card-content">
                        <h6 class="widget-card-amount">{{ showAmount($successful) }}</h6>
                        <p class="widget-card-title">@lang('Successful') {{ __(ucfirst($type)) }}</p>
                    </div>
                </div>
                <span class="widget-card-arrow">
                    <i class="las la-angle-right"></i>
                </span>
            </div>
            <div class="widget-card bg--warning">
                <a href="{{ url()->route("admin.$type.pending", request()->all()) }}" class="widget-card-link"></a>
                <div class="widget-card-left">
                    <div class="widget-card-icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="widget-card-content">
                        <h6 class="widget-card-amount">{{ showAmount($pending) }}</h6>
                        <p class="widget-card-title">@lang('Pending') {{ __(ucfirst($type)) }}</p>
                    </div>
                </div>
                <span class="widget-card-arrow">
                    <i class="las la-angle-right"></i>
                </span>
            </div>

            <div class="widget-card bg--danger">
                <a href="{{ url()->route("admin.$type.rejected", request()->all()) }}" class="widget-card-link"></a>
                <div class="widget-card-left">
                    <div class="widget-card-icon">
                        <i class="fas fa-ban"></i>
                    </div>
                    <div class="widget-card-content">
                        <h6 class="widget-card-amount">{{ showAmount($rejected) }}</h6>
                        <p class="widget-card-title">@lang('Rejected') {{ __(ucfirst($type)) }}</p>
                    </div>
                </div>
                <span class="widget-card-arrow">
                    <i class="las la-angle-right"></i>
                </span>
            </div>

            <div class="widget-card bg--dark">
                <a href="{{ url()->route("admin.$type.initiated", request()->all()) }}" class="widget-card-link"></a>
                <div class="widget-card-left">
                    <div class="widget-card-icon">
                        <i class="la la-money-check-alt"></i>
                    </div>
                    <div class="widget-card-content">
                        <h6 class="widget-card-amount">{{ showAmount($initiated) }}</h6>
                        <p class="widget-card-title">@lang('Initiated') {{ __(ucfirst($type)) }}</p>
                    </div>
                </div>
                <span class="widget-card-arrow">
                    <i class="las la-angle-right"></i>
                </span>
            </div>
        </div>
    </div>
</div>