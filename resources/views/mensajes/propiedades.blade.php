@if (session()->has('success'))
    <div id="success" class="alert alert-success" style="width: 300px">
        {{ session()->get('success') }}
    </div>
@endif
<script>
    setTimeout(function() {
        document.getElementById('success').style.display = 'none';
    }, 3000);
</script>
