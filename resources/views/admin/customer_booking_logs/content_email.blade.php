{!!$content!!}

<script>
    var content = {!! json_encode($content) !!};

    var user = {!! json_encode($user) !!};

    var customer_booking_log = {!! json_encode($customer_booking_log) !!};

    var arr = {!! json_encode($arr) !!};

    var numb = document.getElementsByClassName('spanField');

    for (var i = 0; i < arr.length; i++) {

        for (var m = 0; m < numb.length; m++) {

            if (arr[i] == numb[m].getAttribute('id')) {

                if (user[0][arr[i]]) {

                    numb[m].innerHTML = user[0][arr[i]];
                    
                    numb[m].style.color = 'black';

                    numb[m].style.backgroundColor = '';

                } else if (customer_booking_log[0][arr[i]]) {

                    numb[m].innerHTML = customer_booking_log[0][arr[i]];
                    
                    numb[m].style.color = 'black';

                    numb[m].style.backgroundColor = '';

                }

            }

        }
        
    }
</script>
</html>
