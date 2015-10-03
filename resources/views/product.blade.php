@extends('templates.default')

@section('content')

<div class="product_form">
    {!! Form::open(['action' => 'PagesController@store', 'id' => 'product_form']) !!}

        <label>Product Name</label>
        <input type="text" name="product_name" class="form-control" />

        <label>Quantity</label>
        <input type="text" name="quantity" class="form-control" />

        <label>Price</label>
        <input type="text" name="price" class="form-control" />

        <input name="Submit" value="Submit" class="btn btn-primary" id="submit_button"/>

    {!! Form::close() !!}
</div>

    <div class="product_data">
        <div class="well" id="data_table">
            {{ $data }}
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $('#submit_button').click(function( e ){
            e.preventDefault;
            var data = $('#product_form').serialize();
            $.ajax({
                method: "POST",
                url: "/",
                data: data
            }).done(function( data ) {
                $("#data_table").html(data);
            });
        })

    </script>
@endsection