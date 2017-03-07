<script>
    $('a').on('click', function () {
        if($(this).attr("ref")){
            window.location.href = ($(this).attr("ref"));
        }
    });
</script>