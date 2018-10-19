@push('scripts')
<script type="text/javascript">
    $('#title').on('blur', function() {
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
                              .replace(/[^a-z0-9-]+/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
    });

    tinymce.init({
        selector     : "textarea",
        thema        : "inlite",
        height        : "360",
        plugins      : [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                        "table contextmenu directionality emoticons fullscreen paste textcolor responsivefilemanager code"
                        ],
        toolbar1     : "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2     : "| responsivefilemanager | link unlink anchor | forecolor backcolor  | print fullscreen preview code emoticons |",
        image_advtab : true,
        relative_urls: false,

        external_filemanager_path:"{!! str_finish(asset('b/plugin/filemanager'),'/') !!}",
        filemanager_title        :"FILEMANAGER IMAGE PEKALONGANINFO" , // bisa diganti terserah anda
        external_plugins         : { "filemanager" : "{{ asset('b/plugin/tinymce/plugins/responsivefilemanager/plugin.min.js') }}"}
    });

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
	})

	// hide and show input category
	$('#add-new-cat').hide();
	$('#add-cat-btn').click(function() {
		$('#add-new-cat').slideToggle(function() {
			$('#new_cat').focus();
		});
		return false;
	});

	function showHide()
	{
		$('#add-new-cat').hide();
	}

    $('#new_cat').on('blur', function() {
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#cat-slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
                              .replace(/[^a-z0-9-]+/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
    });

	// ajax untuk menyimpan kategory
	$('#add-new-btn').click(function() {
		var newCat = $('#new_cat');
		var inputCat = newCat.closest('.input-group');

		$.ajax({
			url: "{{ route('categories.saveCategory') }}",
			method: 'post',
			data: {
				name: $("#new_cat").val(),
				slug: $("#cat-slug").val(),
				_token: $("input[name=_token]").val()
			},
			success: function(category) {
				if (category.id != null) {
					inputCat.removeClass('has-error');
					inputCat.next('text-danger').remove();

					var newOption = $('<option></option>')
							.attr('value', category.id)
							.attr('selected', true)
							.text(category.name);

					$("select[name=category_id]")
						.append( newOption );

					showHide();
					newCat.val("");
				}
				console.log(category);
			},
			error: function(xhr) {
				var errors = xhr.responseJSON;
				var error = errors.errors.name;
				if (error) {

					// hapus pesan error sebelumnya jika ada lalu lanjutkan
					inputCat.next('.text-danger').remove();

					inputCat
						.addClass('has-error')
						.after('<p class="text-danger">' + error + '</p');
				}
			}
		});
	});

	$("#datetimepicker1").datetimepicker({
		format: "YYYY-MM-DD HH:mm:ss",
		showClear: true
	});

	// button draft
	$('#draft-btn').click(function(e) {
		e.preventDefault();
		$('#publilshed_at').val("");
		$('#post-form').submit();
    });
    //form validasi
    $(".form-inputan").validate();
</script>
@endpush
