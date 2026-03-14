@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => isset($insurance) ? "Sửa Quỹ Bảo Hiểm" : "Thêm Quỹ Bảo Hiểm",
            "subtitle" => "Quản lý thông tin bảo hiểm của user",
        ]
    )

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form
                method="POST"
                id="insuranceForm"
                action="{{ isset($insurance) ? route("admin.insurances.update", $insurance->id) : route("admin.insurances.store") }}"
                enctype="multipart/form-data"
            >
                @csrf
                @if (isset($insurance))
                    @method("PUT")
                @endif

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Họ tên User
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="full_name"
                                        class="form-control"
                                        placeholder="Nhập họ tên"
                                        value="{{ old("full_name", $insurance->full_name ?? "") }}"
                                    />
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Số tiền đóng (VND)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="number"
                                        name="amount"
                                        class="form-control"
                                        placeholder="20000000"
                                        value="{{ old("amount", isset($insurance) ? (int) $insurance->amount : "") }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="select">
                                        <option
                                            value="1"
                                            {{ old("status", $insurance->status ?? 1) == 1 ? "selected" : "" }}
                                        >
                                            Hoạt động
                                        </option>
                                        <option
                                            value="0"
                                            {{ old("status", $insurance->status ?? 1) == 0 ? "selected" : "" }}
                                        >
                                            Tạm dừng
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Ngày tham gia
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="date"
                                        name="insurance_date"
                                        class="form-control"
                                        value="{{ old("insurance_date", isset($insurance) ? $insurance->insurance_date->format("Y-m-d") : "") }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Ngày hết hạn</label>
                                    <input
                                        type="date"
                                        name="expired_at"
                                        class="form-control"
                                        value="{{ old("expired_at", isset($insurance) && $insurance->expired_at ? $insurance->expired_at->format("Y-m-d") : "") }}"
                                    />
                                </div>
                            </div>
                        </div>

                        {{-- Dynamic: Thông tin liên hệ --}}
                        <h5 class="card-title mt-4">Thông tin liên hệ</h5>
                        <div id="contact-rows">
                            @php
                                $contacts = old("contact_info", $insurance->contact_info ?? [["platform" => "", "link" => ""]]);
                            @endphp

                            @foreach ($contacts as $i => $contact)
                                <div class="row align-items-end contact-row mb-3">
                                    <div class="col-lg-5">
                                        <div class="form-group mb-0">
                                            <label>Nền tảng (VD: Facebook, Zalo, SĐT)</label>
                                            <input
                                                type="text"
                                                name="contact_info[{{ $i }}][platform]"
                                                class="form-control"
                                                value="{{ $contact["platform"] ?? "" }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-0">
                                            <label>Giá trị (Link/Số)</label>
                                            <input
                                                type="text"
                                                name="contact_info[{{ $i }}][link]"
                                                class="form-control"
                                                value="{{ $contact["link"] ?? "" }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-remove-row">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-4 text-end">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary" id="add-contact">
                                <i data-feather="plus"></i>
                                Thêm liên hệ
                            </a>
                        </div>

                        {{-- Dynamic: Tài khoản thanh toán --}}
                        <h5 class="card-title mt-4">Tài khoản thanh toán (Ngân hàng/Momo)</h5>
                        <div id="payment-rows">
                            @php
                                $payments = old("payment_accounts", $insurance->payment_accounts ?? [["bank" => "", "number" => "", "name" => ""]]);
                            @endphp

                            @foreach ($payments as $i => $payment)
                                <div class="row align-items-end payment-row mb-3">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-0">
                                            <label>Ngân hàng/Ví</label>
                                            <input
                                                type="text"
                                                name="payment_accounts[{{ $i }}][bank]"
                                                class="form-control"
                                                value="{{ $payment["bank"] ?? "" }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-0">
                                            <label>Số tài khoản</label>
                                            <input
                                                type="text"
                                                name="payment_accounts[{{ $i }}][number]"
                                                class="form-control"
                                                value="{{ $payment["number"] ?? "" }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-0">
                                            <label>Chủ TK</label>
                                            <input
                                                type="text"
                                                name="payment_accounts[{{ $i }}][name]"
                                                class="form-control"
                                                value="{{ $payment["name"] ?? "" }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-remove-row">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-4 text-end">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary" id="add-payment">
                                <i data-feather="plus"></i>
                                Thêm tài khoản
                            </a>
                        </div>

                        {{-- Dynamic: Dịch vụ --}}
                        <h5 class="card-title mt-4">Dịch vụ cung cấp</h5>
                        <div id="service-rows">
                            @php
                                $services = old("services", $insurance->services ?? [["title" => ""]]);
                            @endphp

                            @foreach ($services as $i => $service)
                                <div class="row align-items-end service-row mb-3">
                                    <div class="col-lg-11">
                                        <div class="form-group mb-0">
                                            <label>Tên dịch vụ</label>
                                            <input
                                                type="text"
                                                name="services[{{ $i }}][title]"
                                                class="form-control"
                                                value="{{ $service["title"] ?? "" }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-remove-row">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-4 text-end">
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary" id="add-service">
                                <i data-feather="plus"></i>
                                Thêm dịch vụ
                            </a>
                        </div>
                    </div>

                    {{-- Image upload --}}
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                Avatar / Ảnh đại diện
                                @unless (isset($insurance))
                                    <span class="text-danger">*</span>
                                @endunless
                            </label>
                            <div class="image-upload">
                                <input type="file" name="avatar" id="avatarInput" accept="image/*" />
                                <div class="image-uploads">
                                    <img src="/assets/img/icons/upload.svg" alt="img" />
                                    <h4>Kéo thả file hoặc bấm vào đây để tải lên</h4>
                                </div>
                            </div>
                        </div>

                        <div
                            class="product-list"
                            id="imagePreviewContainer"
                            style="{{ isset($insurance) && $insurance->avatar ? "" : "display: none;" }}"
                        >
                            <ul class="row">
                                <li class="col-12 pt-3 text-center">
                                    <a
                                        href="{{ isset($insurance) && $insurance->avatar ? asset("storage/" . $insurance->avatar) : "#" }}"
                                        id="lightboxLink"
                                        target="_blank"
                                        title="Click để xem ảnh lớn"
                                    >
                                        <img
                                            src="{{ isset($insurance) && $insurance->avatar ? asset("storage/" . $insurance->avatar) : "" }}"
                                            alt="avatar"
                                            id="avatarPreview"
                                            class="img-fluid rounded"
                                            style="
                                                max-height: 200px;
                                                cursor: pointer;
                                                border: 1px solid #ddd;
                                                padding: 5px;
                                            "
                                        />
                                    </a>
                                </li>
                            </ul>
                        </div>

                        @if (! isset($insurance) || ! $insurance->avatar)
                            <div class="product-list" id="defaultTextContainer">
                                <ul class="row">
                                    <li class="col-12 pt-3 text-center">
                                        <h6>Mặc định sẽ lấy avatar từ tài khoản User nếu không upload.</h6>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" id="btnSubmit" class="btn btn-submit me-2">Lưu thay đổi</button>
                        <a href="{{ route("admin.insurances.index") }}" class="btn btn-cancel">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push("scripts")
    <!-- Bổ sung SweetAlert2 nếu chưa có -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let contactIdx = {{ count($contacts) }};
            let paymentIdx = {{ count($payments) }};
            let serviceIdx = {{ count($services) }};

            // --- Logic: Ẩn/hiện icon thùng rác ---
            function toggleRemoveButtons() {
                const rowsTypes = [
                    { id: 'contact-rows', class: 'contact-row' },
                    { id: 'payment-rows', class: 'payment-row' },
                    { id: 'service-rows', class: 'service-row' },
                ];

                rowsTypes.forEach((type) => {
                    const container = document.getElementById(type.id);
                    if (!container) return;
                    const rows = container.querySelectorAll('.' + type.class);
                    const showDelete = rows.length > 1;

                    rows.forEach((row) => {
                        const btn = row.querySelector('.btn-remove-row');
                        if (btn) btn.style.display = showDelete ? 'inline-block' : 'none';
                    });
                });
            }

            // Gọi lần đầu để thiết lập trạng thái ẩn hiện icon xóa
            toggleRemoveButtons();

            document.getElementById('add-contact').addEventListener('click', function () {
                const html = `<div class="row align-items-end mb-3 contact-row">
                <div class="col-lg-5"><div class="form-group mb-0"><label>Nền tảng</label><input type="text" name="contact_info[${contactIdx}][platform]" class="form-control" /></div></div>
                <div class="col-lg-6"><div class="form-group mb-0"><label>Giá trị</label><input type="text" name="contact_info[${contactIdx}][link]" class="form-control" /></div></div>
                <div class="col-lg-1 text-end"><a href="javascript:void(0);" class="btn btn-danger btn-sm btn-remove-row"><i data-feather="trash-2"></i></a></div>
            </div>`;
                document.getElementById('contact-rows').insertAdjacentHTML('beforeend', html);
                if (typeof feather !== 'undefined') feather.replace();
                contactIdx++;
                toggleRemoveButtons();
            });

            document.getElementById('add-payment').addEventListener('click', function () {
                const html = `<div class="row align-items-end mb-3 payment-row">
                <div class="col-lg-4"><div class="form-group mb-0"><label>Ngân hàng/Ví</label><input type="text" name="payment_accounts[${paymentIdx}][bank]" class="form-control" /></div></div>
                <div class="col-lg-4"><div class="form-group mb-0"><label>Số tài khoản</label><input type="text" name="payment_accounts[${paymentIdx}][number]" class="form-control" /></div></div>
                <div class="col-lg-3"><div class="form-group mb-0"><label>Chủ TK</label><input type="text" name="payment_accounts[${paymentIdx}][name]" class="form-control" /></div></div>
                <div class="col-lg-1 text-end"><a href="javascript:void(0);" class="btn btn-danger btn-sm btn-remove-row"><i data-feather="trash-2"></i></a></div>
            </div>`;
                document.getElementById('payment-rows').insertAdjacentHTML('beforeend', html);
                if (typeof feather !== 'undefined') feather.replace();
                paymentIdx++;
                toggleRemoveButtons();
            });

            document.getElementById('add-service').addEventListener('click', function () {
                const html = `<div class="row align-items-end mb-3 service-row">
                <div class="col-lg-11"><div class="form-group mb-0"><label>Tên dịch vụ</label><input type="text" name="services[${serviceIdx}][title]" class="form-control" /></div></div>
                <div class="col-lg-1 text-end"><a href="javascript:void(0);" class="btn btn-danger btn-sm btn-remove-row"><i data-feather="trash-2"></i></a></div>
            </div>`;
                document.getElementById('service-rows').insertAdjacentHTML('beforeend', html);
                if (typeof feather !== 'undefined') feather.replace();
                serviceIdx++;
                toggleRemoveButtons();
            });

            document.addEventListener('click', function (e) {
                const removeBtn = e.target.closest('.btn-remove-row');
                if (removeBtn) {
                    removeBtn.closest('.row').remove();
                    toggleRemoveButtons();
                }
            });

            // --- Logic: Thumbnail Preview ---
            const avatarInput = document.getElementById('avatarInput');
            if (avatarInput) {
                avatarInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const previewContainer = document.getElementById('imagePreviewContainer');
                            const defaultText = document.getElementById('defaultTextContainer');
                            const imgElem = document.getElementById('avatarPreview');
                            const lbLink = document.getElementById('lightboxLink');

                            if (imgElem) imgElem.src = e.target.result;
                            if (lbLink) lbLink.href = e.target.result;
                            if (previewContainer) previewContainer.style.display = 'block';
                            if (defaultText) defaultText.style.display = 'none';
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // --- Logic: Confirm Modal + Spinner delay 1s ---
            const form = document.getElementById('insuranceForm');
            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Xác nhận lưu?',
                        text: 'Bạn có chắc chắn muốn lưu các thông tin này?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#ff9f43',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const btnSubmit = document.getElementById('btnSubmit');
                            const originalText = btnSubmit.innerHTML;

                            btnSubmit.disabled = true;
                            btnSubmit.innerHTML =
                                '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Đang xử lý...';

                            setTimeout(() => {
                                form.submit();
                            }, 1000);
                        }
                    });
                });
            }
        });
    </script>
@endpush
