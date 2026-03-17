<script src="/assets/js/jquery-3.6.0.min.js"></script>

<script src="/assets/js/feather.min.js"></script>

<script src="/assets/js/jquery.slimscroll.min.js"></script>

<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/plugins/select2/js/select2.min.js"></script>

<script src="/assets/js/moment.min.js"></script>
<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="/assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="/assets/plugins/apexchart/chart-data.js"></script>

<script src="/assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function () {
    const sunEditors = [];

    $('.editor').each(function (index, element) {
      const editor = SUNEDITOR.create(element, {
        lang: SUNEDITOR_LANG['en'],
        width: '100%',
        height: 'auto',
        buttonList: [
          ['undo', 'redo'],
          ['font', 'fontSize', 'formatBlock'],
          ['paragraphStyle', 'blockquote'],
          ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
          ['fontColor', 'hiliteColor', 'textStyle'],
          ['removeFormat'],
          ['outdent', 'indent'],
          ['align', 'horizontalRule', 'list', 'lineHeight'],
          ['table', 'link', 'image', 'video', 'audio'],
          ['fullScreen', 'showBlocks', 'codeView'],
          ['preview', 'print'],
        ],
      });

      sunEditors.push(editor);
    });

    $('form').on('submit', function () {
      sunEditors.forEach((editor) => {
        editor.save();
      });

      return true;
    });
  });
</script>
@stack('scripts')
