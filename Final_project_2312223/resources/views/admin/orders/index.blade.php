
@extends('admin.layout')

@section('content')

    <h3 style="color:#ff4fa7; font-weight:600; margin-bottom:20px;">All Orders</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->total }}</td>
                <td>
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="pending" @selected($order->status=='pending')>Pending</option>
                            <option value="processing" @selected($order->status=='processing')>Processing</option>
                            <option value="completed" @selected($order->status=='completed')>Completed</option>
                            <option value="canceled" @selected($order->status=='canceled')>Canceled</option>
                        </select>
                    </form>
                </td>


                <td class="d-flex gap-2">

                    {{-- View Button --}}
                    <a href="{{ route('admin.orders.show', $order->id) }}"
                       class="btn btn-sm px-3"
                       style="background:#ffb6c1; color:#6b0031; border-radius:10px; font-weight:600; border:none;">
                        <i class="fa fa-eye"></i> View
                    </a>

                    {{-- Delete Button --}}
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Are you sure?')"
                                class="btn btn-sm px-3"
                                style="background:#ff6f91; color:white; border-radius:10px; font-weight:600; border:none;">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
