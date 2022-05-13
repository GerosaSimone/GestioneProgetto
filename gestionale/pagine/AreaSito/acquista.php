<div class="container">
    <div class="row">
        <label>Giocatore</label>
        <input type="text" name="city" id="search_city" placeholder="Type to search..." class="form-control">
    </div>
</div>


<script type="text/javascript">
    $(function() {
        $("#search_city").autocomplete({
            source: 'pagine/AreaShop/giocatori-search.php',
        });
    });
</script>