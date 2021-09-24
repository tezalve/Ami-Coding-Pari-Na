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
    <script src="{{asset('JQuery/jquery-3.6.0.min.js')}}"></script>
    <script>
        document.getElementById("btnSubmit").addEventListener("click", function() {
            // get values from input
            var x = document.getElementById("input").value;
            var ser = document.getElementById("ser").value;

            const arr = x.split(","); //separate by commas
            const temp = [];

            //check for non numbers
            for(var i=0; i<arr.length; i++){
                if ( isNaN(arr[i]) || arr[i]==""){
                    location.reload();
                    alert("Input or search field invalid!");
                    break;
                } else {
                    temp[i] = parseInt(arr[i]);
                }
            }

            var sorted = temp;
            sorted.sort(function(a, b){return b-a});// sort the array
            var str = "" + sorted[0];

            // array to string
            for(var i=1; i<sorted.length; i++){
                str = str + ", " + sorted[i];
            }
            
            // check if search value matches
            document.getElementById("input_real").value = str;
            for(var i=0; i<sorted.length; i++){
                if( ser == sorted[i]){
                    document.getElementById("bool").innerHTML = "True";
                    break;
                } else {
                    document.getElementById("bool").innerHTML = "False";
                }
            }
        });
    </script>

    <script>
        // submit using ajax so page won't reload
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
                    console.log(data);
                }
            });
        });
    </script>
@endsection
    