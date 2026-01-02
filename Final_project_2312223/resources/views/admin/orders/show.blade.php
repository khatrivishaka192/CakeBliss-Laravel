
{{--@extends('admin.layout')--}}

{{--@section('content')--}}

{{--    <h2>Order #{{ $order->id }}</h2>--}}

{{--    <!-- Customer Info -->--}}
{{--    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>--}}
{{--    <p><strong>Email:</strong> {{ $order->email }}</p>--}}
{{--    <p><strong>Phone:</strong> {{ $order->phone }}</p>--}}
{{--    <p><strong>Address:</strong> {{ $order->address }}</p>--}}
{{--    <p><strong>Status:</strong> {{ $order->status }}</p>--}}

{{--    <!-- Order Items -->--}}
{{--    <h4>Items:</h4>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Cake Name</th>--}}
{{--            <th>Quantity</th>--}}
{{--            <th>Price</th>--}}
{{--            <th>Subtotal</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($order->items as $item)--}}
{{--            <tr>--}}
{{--                <td>{{ $item->cake ? $item->cake->name : 'Cake deleted' }}</td>--}}
{{--                <td>{{ $item->quantity }}</td>--}}
{{--                <td>{{ $item->price }}</td>--}}
{{--                <td>{{ $item->price * $item->quantity }}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    <!-- Update Status -->--}}
{{--    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}
{{--        <label>Status:</label>--}}
{{--        <select name="status" class="form-control w-25 mb-2">--}}
{{--            <option value="pending" @if($order->status=='pending') selected @endif>Pending</option>--}}
{{--            <option value="processing" @if($order->status=='processing') selected @endif>Processing</option>--}}
{{--            <option value="completed" @if($order->status=='completed') selected @endif>Completed</option>--}}
{{--            <option value="canceled" @if($order->status=='canceled') selected @endif>Canceled</option>--}}
{{--        </select>--}}
{{--        <button type="submit" class="btn btn-success">Update Status</button>--}}
{{--    </form>--}}

{{--@endsection--}}
@extends('admin.layout')

@section('content')

    <h2 style="color:#ff4fa7; font-weight:600; margin-bottom:20px;">Order #{{ $order->id }}</h2>

    <!-- Customer Info -->
    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <!-- Order Items -->
    <h4>Items:</h4>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Cake Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->cake_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ number_format($item->subtotal, 2) }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-end fw-bold">Total:</td>
            <td class="fw-bold">{{ number_format($order->items->sum('subtotal'), 2) }}</td>
        </tr>
        </tbody>
    </table>

    <!-- Update Status -->
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Status:</label>
        <select name="status" class="form-control w-25 mb-2">
            <option value="pending" @if($order->status=='pending') selected @endif>Pending</option>
            <option value="processing" @if($order->status=='processing') selected @endif>Processing</option>
            <option value="completed" @if($order->status=='completed') selected @endif>Completed</option>
            <option value="canceled" @if($order->status=='canceled') selected @endif>Canceled</option>
        </select>
{{--        <button type="submit" class="btn btn-success">Update Status</button>--}}
        <button type="submit" class="btn"
                style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px; padding:6px 15px;">
            Update Status
        </button>
    </form>

@endsection
