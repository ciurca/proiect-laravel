@extends('layouts.app')
@section('title', 'Cart')
@section('content')
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.mi
n.js"></script>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
></script>
<div class="container mb-5">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Bilet</th>
            <th style="width:10%">Pret</th>
            <th style="width:8%">Cantitate</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                    <?php $total += $details['pret'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['tip'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['pret'] }} lei</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}"
                               class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{
$details['pret'] * $details['quantity'] }} lei</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i>Update</button>
                        <button class="btn btn-danger btn-sm remove-from-cart"
                                data-id="{{ $id }}"><i class="fa fa-trash-o"></i>Sterge</button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td><a href="{{ route('participant.index') }}" class="btn btn-warning"><i class="fa
fa-angle-left"></i> Continuare Cumparaturi</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total {{ $total
}} lei</strong></td>
        </tr>
        </tfoot>
    </table>
    @section('scripts')
        <script type="text/javascript">
            $(".update-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });
            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                if(confirm("Esti sigur!!!")) {
                    $.ajax({
                        url: '{{ url('remove-from-cart') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>
    @endsection
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Esti sigur!!!")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    </div>
@endsection