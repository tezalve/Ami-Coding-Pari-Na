@extends('layouts.layout')
@section('content')
    <div>
        <p>the search begins here</p>
    </div>
    <form method="POST" action="{{ url('api/store') }}" id="search">
        @php $form_type ='search' @endphp
        @include('khoj/_form')
    </form>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.getElementById("btnSubmit").addEventListener("click", function() {
            var x = document.getElementById("input").value;
            var ser = document.getElementById("ser").value;
            console.log(x);
            console.log(ser);


            const arr = x.split(",");
            const temp = [];
            console.log(arr);
            for(var i=0; i<arr.length; i++){
                if ( isNaN(arr[i]) || arr[i]==""){
                    alert("Input or search field invalid!");
                    location.reload();
                } else {
                    temp[i] = parseInt(arr[i]);
                    console.log(temp + " is a number");
                }
            }
            var sorted = temp;
            sorted.sort(function(a, b){return b-a});
            console.log(sorted);
            var str = "" + sorted[0];
            for(var i=1; i<sorted.length; i++){
                str = str + ", " + sorted[i];
            }
            console.log(str);
            document.getElementById("input_real").value = str;
            for(var i=0; i<sorted.length; i++){
                if( ser == sorted[i]){
                    document.getElementById("bool").innerHTML = "True";
                    console.log("here");
                    break;
                } else {
                    document.getElementById("bool").innerHTML = "False";
                }
            }
        });
    </script>
    
    <script>
        $("#search").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                },
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    alert(data); // show response from the php script.
                }
            });
        });
    </script>
@endsection
    