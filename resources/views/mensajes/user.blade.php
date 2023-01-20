@if (session()->has('successp'))
    <div id="successp" class="alert alert-success" style="width: 300px">
        {{ session()->get('successp') }}
    </div>
@endif
<script>
    setTimeout(function() {
        document.getElementById('successp').style.display = 'none';
    }, 3000);
</script>
@if (session()->has('deleted'))
    <div id="deleted" class="alert alert-danger" style="width: 300px">
        {{ session()->get('deleted') }}
    </div>
@endif
<script>
    setTimeout(function() {
        document.getElementById('deleted').style.display = 'none';
    }, 3000);
</script>