$(document).ready(function() {
    $('#ES_READ_NR_SEQ').on('change', function() {
        var regiaoadm = this.value;
        $("#ES_MUNI_NR_SEQ").html('');
        $.ajax({
            url: "{{url('municipios')}}",
            type: "POST",
            data: {
                regiaoadm: regiaoadm,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#ES_MUNI_NR_SEQ').html('<option value="">Select State</option>');
                $.each(result, function(key, value) {
                    $("#ES_MUNI_NR_SEQ").append('<option value="' + value.muni_nr_seq + '">' + value.muni_ds + '</option>');
                });
            }
        });
    });

});
