@push('scripts')
$document()
<script type="text/javascript">
    $('#browser_file').on('click', function(e) {
    $('#image').click();
});

$('#image').on('change', function(e) {
    var file = this;
    if (file.files[0])
    {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            $('#img').attr('src', e.target.result);
        }
        reader.readAsDataURL(file.files[0]);
    }
});
$("#datetimepicker1").datetimepicker({
    format: "YYYY-MM-DD HH:mm:ss",
    showClear: true
});

$("#datetimepicker2").datetimepicker({
    format: "YYYY-MM-DD HH:mm:ss",
    showClear: true
});

</script>
@endpush
