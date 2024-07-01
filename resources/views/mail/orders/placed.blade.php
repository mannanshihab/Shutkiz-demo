<x-mail::message>
# Order Placed Successfully !

Thank You for your order. Your order number is: {{ now()->year }}-000{{$order->id}}.

<x-mail::button :url="$url">
    View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
