// Requires: jQuery, Sortable, Fancybox (loaded before this file)
// Requires window globals set by the blade template:
//   _authUserId, _csrfToken, _nfCurrentPage, _nfLastPage, _nfUserReportedIds

Fancybox.bind('[data-fancybox]', {
  animated: false,
  Toolbar: { display: { left: [], middle: [], right: ['close'] } },
});

window.openCardGallery = function (images, startIndex) {
  const items = images.map(function (src) {
    return { src: src, type: 'image' };
  });
  Fancybox.show(items, {
    startIndex: startIndex || 0,
    animated: false,
    Toolbar: { display: { left: [], middle: [], right: ['close'] } },
  });
};

$(function () {
  // ===== State =====
  let currentPage = window._nfCurrentPage;
  const lastPage = window._nfLastPage;
  let loading = false;
  let currentCategory = '';
  let currentQ = '';
  let searchTimer = null;
  const userReportedIds = window._nfUserReportedIds || [];

  const $feed = $('#nf-feed');
  const $sentinel = $('#nf-sentinel');
  const $loader = $('#nf-loader');
  const $endMsg = $('#nf-end-msg');
  const $nfContent = $('#nf-content');
  const $catInput = $('#nf-category');
  const $catDropdown = $('#nf-cat-dropdown');
  const $btnSubmit = $('#btn-submit-post');

  // ===== Chip active styles =====
  function setActiveChip($el) {
    $('.nf-chip')
      .removeClass('nf-chip-active bg-cs_blue text-white border-cs_blue')
      .addClass('border-gray-200 text-gray-600');
    $el
      .addClass('nf-chip-active bg-cs_blue text-white border-cs_blue')
      .removeClass('border-gray-200 text-gray-600');
  }
  $('.nf-chip.nf-chip-active').addClass('bg-cs_blue text-white border-cs_blue');

  // ===== Category filter chips =====
  $('.nf-chip').on('click', function () {
    currentCategory = $(this).data('category') || '';
    currentPage = 1;
    setActiveChip($(this));
    reloadFeed(true);
  });

  // ===== Search =====
  $('#nf-search').on('input', function () {
    clearTimeout(searchTimer);
    const val = $(this).val().trim();
    searchTimer = setTimeout(function () {
      currentQ = val;
      currentPage = 1;
      reloadFeed(true);
    }, 400);
  });

  // ===== Empty state helper =====
  function emptyStateHtml(text) {
    return (
      '<div class="nf-empty-state flex w-full flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center text-sm text-gray-400 [column-span:all] dark:border-gray-800">' +
      '<i class="fa-regular fa-folder-open mb-3 block text-3xl"></i>' +
      text +
      '</div>'
    );
  }

  // ===== Load posts from API =====
  function loadPosts(page, replace) {
    if (loading) return;
    loading = true;
    if (replace) $endMsg.addClass('hidden');
    $loader.removeClass('hidden');

    const params = { page: page, per_page: 12 };
    if (currentCategory) params.category = currentCategory;
    if (currentQ) params.q = currentQ;

    $.get('/api/newfeed/posts', params)
      .done(function (data) {
        if (replace) $feed.empty();
        if (data.data.length === 0 && replace) {
          $feed.html(emptyStateHtml('Không tìm thấy bài đăng nào.'));
        } else {
          $.each(data.data, function (i, post) {
            $feed.append(renderCard(post));
          });
        }
        currentPage = data.current_page;
        if (data.has_more) {
          $endMsg.addClass('hidden');
        } else {
          $endMsg.removeClass('hidden');
        }
      })
      .fail(function (e) {
        console.error('Load posts error:', e);
      })
      .always(function () {
        loading = false;
        $loader.addClass('hidden');
      });
  }

  function reloadFeed(replace) {
    loadPosts(1, replace !== false);
  }
  window.reloadFeed = reloadFeed;

  // ===== HTML escape + inline markdown renderer =====
  function escapeHtml(s) {
    return $('<div>').text(s).html();
  }

  function formatPostContent(text) {
    let s = escapeHtml(text);
    s = s.replace(/\*\*(.+?)\*\*/gs, '<strong>$1</strong>');
    s = s.replace(/__(.+?)__/gs, '<u>$1</u>');
    s = s.replace(/\*(.+?)\*/gs, '<em>$1</em>');
    return s.replace(/\n/g, '<br>');
  }

  // ===== Image grid builder =====
  const SHOW_MAX = 4;
  function buildImageGrid(images) {
    if (!images || images.length === 0) return '';
    const total = images.length;
    const show = Math.min(total, SHOW_MAX);
    const extra = total - show;
    const gridCols = show === 1 ? 'grid-cols-1' : 'grid-cols-2';
    const imagesJson = JSON.stringify(images);
    let html = '<div class="mt-3 grid gap-1 ' + gridCols + '">';
    for (let i = 0; i < show; i++) {
      const url = images[i];
      const isLast = i === show - 1;
      const spanCls = show === 3 && i === 0 ? ' col-span-2' : '';
      const hCls = show === 1 ? ' max-h-72' : ' h-36';
      html +=
        '<div onclick="event.stopPropagation();openCardGallery(' +
        imagesJson.replace(/"/g, '&quot;') +
        ',' +
        i +
        ')" class="relative cursor-pointer overflow-hidden rounded-lg' +
        spanCls +
        hCls +
        '">';
      html += '<img src="' + url + '" alt="" class="h-full w-full object-cover" loading="lazy">';
      if (isLast && extra > 0) {
        html +=
          '<div class="absolute inset-0 flex items-center justify-center rounded-lg bg-black/50 pointer-events-none">' +
          '<span class="text-2xl font-black text-white">+' +
          extra +
          '</span></div>';
      }
      html += '</div>';
    }
    html += '</div>';
    return html;
  }

  // ===== Truncate content =====
  const CONTENT_LIMIT = 200;
  function truncateContent(text) {
    const formatted = formatPostContent(text);
    if (text.length <= CONTENT_LIMIT)
      return '<div class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300">' + formatted + '</div>';
    const short = formatPostContent(text.substring(0, CONTENT_LIMIT));
    return (
      '<div class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300">' +
      short +
      '<span class="text-gray-400">...</span></div>'
    );
  }

  // ===== Render card from API JSON =====
  function renderCard(post) {
    const isOwner = window._authUserId && window._authUserId === post.user.id;
    const reported = userReportedIds.includes(post.id) || post.is_reported;
    const tick = post.user.is_verified
      ? '<i class="fa-solid fa-circle-check text-cs_blue ml-1 text-xs" title="Tài khoản đã được CheckScam xác minh uy tín"></i>'
      : '';
    const priceHtml =
      post.price && post.price > 0
        ? '<div class="mt-2 text-sm font-black text-cs_red">' +
          Number(post.price).toLocaleString('vi-VN') +
          ' VNĐ</div>'
        : '';
    const imageHtml = buildImageGrid(post.image_urls);
    const actionBtn = window._authUserId
      ? isOwner
        ? '<button type="button" data-no-nav onclick="deletePost(' +
          post.id +
          ',this)" class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-red-50 text-xs text-cs_red transition hover:bg-red-100 dark:bg-red-900/30" title="Xóa bài"><i class="fa-solid fa-xmark"></i></button>'
        : reported
          ? '<button type="button" data-no-nav class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-not-allowed items-center justify-center rounded-full bg-orange-100 text-xs text-orange-500 dark:bg-orange-900/30" title="Đã báo cáo" disabled><i class="fa-solid fa-flag"></i></button>'
          : '<button type="button" data-no-nav onclick="openReport(' +
            post.id +
            ',this)" class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-gray-100 text-xs text-gray-400 transition hover:bg-orange-50 hover:text-orange-500 dark:bg-slate-700" title="Báo cáo"><i class="fa-regular fa-flag"></i></button>'
      : '';

    return $(
      '<div class="nf-card dark:bg-dark_card relative mb-4 break-inside-avoid cursor-pointer overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 shadow-xs transition hover:shadow-md dark:border-gray-800"' +
        ' data-id="' +
        post.id +
        '" data-post-url="/newfeed/' +
        post.id +
        '">' +
        actionBtn +
        '<div class="flex items-center gap-3 pr-8">' +
        '<img src="' +
        post.user.avatar_url +
        '" alt="" class="h-9 w-9 rounded-full object-cover">' +
        '<div class="min-w-0">' +
        '<div class="flex items-center text-sm font-bold text-gray-800 dark:text-white">' +
        '<span class="truncate">' +
        escapeHtml(post.user.name) +
        '</span>' +
        tick +
        '</div>' +
        '<div class="text-[11px] text-gray-400">' +
        post.created_at +
        ' · ' +
        escapeHtml(post.category) +
        '</div></div></div>' +
        truncateContent(post.content) +
        priceHtml +
        imageHtml +
        '</div>'
    );
  }

  // ===== Infinite scroll =====
  if (lastPage > 1) {
    const observer = new IntersectionObserver(
      function (entries) {
        if (entries[0].isIntersecting && currentPage < lastPage) {
          loadPosts(currentPage + 1, false);
        }
      },
      { threshold: 0.1 }
    );
    observer.observe($sentinel[0]);
  }

  // ===== Card click → detail page =====
  $feed.on('click', '.nf-card', function (e) {
    if ($(e.target).closest('[data-fancybox], [data-no-nav], button').length) return;
    window.location.href = $(this).data('post-url');
  });

  // ===== Popup helpers =====
  window.openPopup = function (id) {
    $('#' + id)
      .removeClass('hidden')
      .addClass('flex');
  };
  window.closePopup = function (id) {
    $('#' + id)
      .removeClass('flex')
      .addClass('hidden');
  };
  $('[id^="popup-"]').on('click', function (e) {
    if (e.target === this) closePopup(this.id);
  });

  // ===== Open post form (auth check) =====
  function openPostForm() {
    window._authUserId ? openPopup('popup-post-form') : openPopup('popup-login');
  }
  $('#btn-open-post-form, #btn-fab').on('click', openPostForm);

  // ===== Category combobox =====
  $catInput.on('focus', function () {
    $catDropdown.removeClass('hidden');
  });
  $catInput.on('blur', function () {
    setTimeout(function () {
      $catDropdown.addClass('hidden');
    }, 200);
  });
  $catInput.on('input', function () {
    const q = $(this).val().toLowerCase();
    $('.nf-cat-option').each(function () {
      $(this).toggle($(this).data('value').toLowerCase().includes(q));
    });
    $catDropdown.removeClass('hidden');
    validateForm();
  });
  $('.nf-cat-option').on('mousedown', function () {
    $catInput.val($(this).data('value'));
    $catDropdown.addClass('hidden');
    validateForm();
  });

  // ===== Content counter + form validation =====
  $nfContent.on('input', function () {
    $('#nf-content-count').text(this.value.length);
    validateForm();
  });
  function validateForm() {
    $btnSubmit.prop('disabled', $nfContent.val().trim().length < 10 || $catInput.val().trim().length === 0);
  }

  // ===== Multi-image upload (drag reorder + per-image delete) =====
  let selectedFiles = [];

  Sortable.create(document.getElementById('nf-preview-grid'), {
    animation: 150,
    ghostClass: 'opacity-40',
    onEnd: function (evt) {
      const moved = selectedFiles.splice(evt.oldIndex, 1)[0];
      selectedFiles.splice(evt.newIndex, 0, moved);
    },
  });

  function renderPreviews() {
    const $grid = $('#nf-preview-grid').empty();
    selectedFiles.forEach(function (file, idx) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $grid
          .find('[data-pending="' + idx + '"]')
          .find('img')
          .attr('src', e.target.result);
      };
      const $item = $(
        '<div data-pending="' +
          idx +
          '" class="relative cursor-grab rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">' +
          '<img src="" class="h-20 w-full object-cover" />' +
          '<button type="button" data-no-nav onclick="removeUploadFile(' +
          idx +
          ')" class="absolute top-0.5 right-0.5 flex h-5 w-5 cursor-pointer items-center justify-center rounded-full bg-red-500 text-[10px] text-white hover:bg-red-600" title="Xóa ảnh">' +
          '<i class="fa-solid fa-xmark"></i></button>' +
          '<div class="absolute inset-x-0 bottom-0 flex justify-center bg-black/25 py-0.5 text-[9px] text-white/70">&#9776;</div>' +
          '</div>'
      );
      $grid.append($item);
      reader.readAsDataURL(file);
    });

    if (selectedFiles.length > 0) {
      $('#nf-image-preview').removeClass('hidden');
      $('#nf-image-drop').addClass('hidden');
    } else {
      $('#nf-image-preview').addClass('hidden');
      $('#nf-image-drop').removeClass('hidden');
    }
  }

  $('#nf-images').on('change', function () {
    const newFiles = Array.from(this.files || []);
    newFiles.forEach(function (f) {
      if (selectedFiles.length < 10) selectedFiles.push(f);
    });
    this.value = '';
    renderPreviews();
  });

  window.removeUploadFile = function (idx) {
    selectedFiles.splice(idx, 1);
    renderPreviews();
  };

  window.clearImages = function () {
    selectedFiles = [];
    renderPreviews();
  };

  // ===== Format text (wrap textarea selection with markdown markers) =====
  window.formatText = function (type) {
    const markers = { bold: '**', italic: '*', underline: '__' };
    const marker = markers[type];
    const ta = $nfContent[0];
    const start = ta.selectionStart;
    const end = ta.selectionEnd;
    const val = ta.value;
    const selected = val.slice(start, end) || 'văn bản';
    ta.value = val.slice(0, start) + marker + selected + marker + val.slice(end);
    const cursor = start + marker.length + selected.length + marker.length;
    ta.focus();
    ta.setSelectionRange(cursor, cursor);
    $nfContent.trigger('input');
  };

  // ===== Submit new post =====
  window.submitPost = function () {
    $btnSubmit.prop('disabled', true).text('Đang đăng...');
    const fd = new FormData();
    fd.append('content', $nfContent.val().trim());
    fd.append('category', $catInput.val().trim());
    const price = $('#nf-price').val();
    if (price) fd.append('price', price);
    selectedFiles.forEach(function (f) {
      fd.append('images[]', f);
    });
    fd.append('_token', window._csrfToken);

    $.ajax({ url: '/api/newfeed/posts', method: 'POST', data: fd, processData: false, contentType: false })
      .done(function (data) {
        $feed.find('.nf-empty-state').remove();
        $feed.prepend(renderCard(data.post));
        closePopup('popup-post-form');
        resetPostForm();
      })
      .fail(function (xhr) {
        alert((xhr.responseJSON && xhr.responseJSON.message) || 'Có lỗi xảy ra khi đăng bài.');
      })
      .always(function () {
        validateForm();
        $btnSubmit.text('Đăng bài');
      });
  };

  function resetPostForm() {
    $nfContent.val('');
    $('#nf-content-count').text('0');
    $('#nf-price').val('');
    $catInput.val('');
    clearImages();
    validateForm();
  }

  // ===== Delete post =====
  window.deletePost = function (postId, btn) {
    if (!confirm('Bạn có chắc muốn xóa bài đăng này?')) return;
    $.ajax({
      url: '/api/newfeed/posts/' + postId,
      method: 'DELETE',
      headers: { 'X-CSRF-TOKEN': window._csrfToken, Accept: 'application/json' },
    })
      .done(function () {
        const $card = $(btn).closest('.nf-card');
        $card.css({ opacity: 0, transform: 'scale(0.95)', transition: 'all 0.2s ease' });
        setTimeout(function () {
          $card.remove();
        }, 200);
      })
      .fail(function () {
        alert('Không thể xóa bài này.');
      });
  };

  // ===== Report =====
  window.openReport = function (postId) {
    $('#report-post-id').val(postId);
    $('input[name="report-reason"]').prop('checked', false);
    $('#btn-submit-report').prop('disabled', true);
    openPopup('popup-report');
  };
  $(document).on('change', 'input[name="report-reason"]', function () {
    $('#btn-submit-report').prop('disabled', false);
  });
  window.submitReport = function () {
    const postId = $('#report-post-id').val();
    const reason = $('input[name="report-reason"]:checked').val();
    if (!reason) {
      alert('Vui lòng chọn lý do báo cáo.');
      return;
    }
    $.ajax({
      url: '/api/newfeed/posts/' + postId + '/report',
      method: 'POST',
      contentType: 'application/json',
      headers: { 'X-CSRF-TOKEN': window._csrfToken, Accept: 'application/json' },
      data: JSON.stringify({ reason: reason }),
    })
      .done(function () {
        closePopup('popup-report');
        userReportedIds.push(parseInt(postId));
        const $flagBtn = $('.nf-card[data-id="' + postId + '"]').find('[title="Báo cáo"]');
        if ($flagBtn.length) {
          $flagBtn
            .attr('title', 'Đã báo cáo')
            .prop('disabled', true)
            .removeClass('cursor-pointer hover:bg-orange-50 hover:text-orange-500 text-gray-400 transition')
            .addClass('cursor-not-allowed text-orange-500')
            .html('<i class="fa-solid fa-flag"></i>');
        }
      })
      .fail(function (xhr) {
        alert((xhr.responseJSON && xhr.responseJSON.error) || 'Không thể gửi báo cáo.');
      });
  };
});
