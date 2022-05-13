<div class="form-group mt-2" style="max-height:45%">
    <label>Foto</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%" required>
    <div><img id="fotoNews" class="mt-3" src="" required /></div>
    <label class="mt-2">Titolo</label>
    <input type="text" name="titolo" class="form-control form-control-sm mb-2" required>
    <label>Descrizione</label>
    <textarea class="form-control" name="descrizione" rows="4" cols="50" required></textarea>
</div>


<script>
    function readFoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoNews')
                    .attr('src', e.target.result);
                $('#fotoNews')
                    .attr('style', " height: 250px; width: auto; object-fit: cover;max-width:470px");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>