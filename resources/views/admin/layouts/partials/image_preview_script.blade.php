<script>
  /**
   * Reusable Image Preview Function
   * @param {string} inputId - ID of the file input
   * @param {string} previewId - ID of the container to show previews
   * @param {boolean} isMultiple - Support multiple files
   */
  function initImagePreview(inputId, previewId, isMultiple = false) {
    const $input = $(`#${inputId}`);
    const $preview = $(`#${previewId}`);

    if (!$input.length || !$preview.length) return;

    // Optional: Hide existing images if needed
    const $existing = $preview.find('.existing-image');

    $input.on('change', function (e) {
      const files = e.target.files;
      if (!isMultiple) {
        $preview.find('.image-preview-item').remove();
        if ($existing.length) $existing.hide();
      }

      $.each(files, function (i, file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const html = `
                    <div class="image-preview-item mt-2 position-relative d-inline-block me-2 border rounded p-1 bg-white">
                        <img src="${e.target.result}" style="max-height: 120px; max-width: 100%; display: block;" class="rounded shadow-sm">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 p-0 remove-preview" style="width: 22px; height: 22px; line-height: 20px; border-radius: 50%; margin: -10px -10px 0 0; border: 2px solid white;">&times;</button>
                    </div>
                `;
          const $item = $(html);
          $item.find('.remove-preview').on('click', function (e) {
            e.preventDefault();
            $item.remove();
            if (!isMultiple) {
              $input.val('');
              if ($existing.length) $existing.show();
            }
          });
          $preview.append($item);
        };
        reader.readAsDataURL(file);
      });
    });
  }
</script>
