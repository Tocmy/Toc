<table class="table table-border nmt" id="couponhistory">
    <thead>
        <tr>
            <th class="text-left">{{ __('Coupon Id') }}</th>
            <th class="text-lfet">{{ __('Customer Name') }}</th>
            <th class="text-left">{{ __('Customer Email') }}</th>
            <th class="text-left">{{ __('Order Status') }}</th>
            <th class="text-left">{{ __('Amount') }}</th>
            <th class="text-left">{{ __('Payment Status') }}</th>
            <th class="text-left">{{ __('Payment Method') }}</th>
            <th class="text-left">{{ __('Order Date') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr >
            @foreach ($images as $image )
            <td class="text-left" data-title="{{ __('Coupon Id') }}">{!! $image->image !!}</td>
            <td class="text-left" data-title="{{ __('Customer Name') }}">{!! $image->link !!}</td>
            <td class="text-left" data-title="{{ __('Order Status') }}">{!! $image->title !!}</td>
            <td class="text-left" data-title="{{ __('Amount') }}">{!! $image->description !!}</td>
            <td class="text-left" data-title="{{ __('Payment Status') }}">{!! $image->param !!}</td>
            <td class="text-left" data-title="{{ __('Payment Method') }}">{!! $image->custom_code !!}</td>
            <td class="text-left" data-title="{{ __('Order Date') }}">{!! date('d M y h:i:s a', strtotime($order->created_at)) !!}</td>
            @endforeach

        </tr>
    </tbody>

</table>
