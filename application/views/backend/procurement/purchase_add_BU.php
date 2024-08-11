<!DOCTYPE html>
<html>

<head>
    <title>Form Dinamis</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <form method="POST" action="<?php echo site_url('procurement/purchase_form/add'); ?>">

        <div id="form-container">
            <div class="form-group">
                <label for="name">Nama:</label>
                <select class="name form-control">
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                </select>
                <button type="button" class="remove">Hapus</button>
            </div>
        </div>
        <div id="form-container2">
        </div>

        <button type="button" id="add">Tambah</button>
        <button type="submit" id="adding">adding</button>
        <button type="submit">Kirim</button>
    </form>

    <script>
    $(document).ready(function() {
        // Menambahkan field baru
        $("#add").click(function() {
            var html = '<div class="form-group">';
            html += '<label for="name">Nama:</label>';
            html += '<button type="button" class="remove">Hapus</button>';
            html += '</div>';

            $("#form-container").append(html);
        });

        // Menghapus field
        $(document).on("click", ".remove", function() {
            $(this).parent().remove();
        });

        // Submit form
        $("#adding").click(function(event) {
            // $("#dynamic-form").submit(function(event) {
            event.preventDefault();

            // Mendapatkan semua nilai field nama
            var names = [];
            $(".name").each(function() {
                names.push($(this).val());
            });
            $(".name").val('');
            let html = '<div class="form-group">';
            html += '<label for="name">Nama:</label>';
            html += '<input type="text" name="name[]" class="namse" value="' + names + '">';
            html += '<button type="button" class="remove">Hapus</button>';
            html += '</div>';
            console.log(html)

            // Lakukan sesuatu dengan data yang dikumpulkan
            $("#form-container").append(html);

        });
    });
    </script>
</body>

</html>