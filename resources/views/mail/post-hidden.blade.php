<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài đăng của bạn đã bị ẩn</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
        margin: 0;
        padding: 20px;
      }
      .container {
        max-width: 600px;
        margin: 0 auto;
        background: #fff;
        border-radius: 8px;
        padding: 32px;
      }
      .header {
        border-bottom: 2px solid #ff0000;
        padding-bottom: 16px;
        margin-bottom: 24px;
      }
      .label {
        font-size: 11px;
        font-weight: bold;
        color: #888;
        text-transform: uppercase;
      }
      .value {
        font-size: 14px;
        color: #333;
        margin-top: 4px;
      }
      .content-box {
        background: #f9f9f9;
        border-left: 3px solid #ccc;
        padding: 12px 16px;
        border-radius: 4px;
        margin: 16px 0;
      }
      .footer {
        margin-top: 32px;
        font-size: 12px;
        color: #888;
        border-top: 1px solid #eee;
        padding-top: 16px;
      }
      a {
        color: #3399ff;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2 style="margin: 0; color: #ff0000; font-size: 18px">⚠ Bài đăng của bạn đã bị ẩn</h2>
      </div>

      <p>
        Xin chào
        <strong>{{ $post->user->full_name ?? $post->user->username }}</strong>
        ,
      </p>

      <p>
        Bài đăng của bạn trong
        <strong>Khu Mua Bán</strong>
        đã bị ẩn tự động do nhận quá nhiều báo cáo từ cộng đồng.
      </p>

      <div>
        <div class="label">Danh mục</div>
        <div class="value">{{ $post->category }}</div>
      </div>

      <div style="margin-top: 16px">
        <div class="label">Nội dung bài đăng</div>
        <div class="content-box">{{ Str::limit($post->content, 200) }}</div>
      </div>

      <div style="margin-top: 16px">
        <div class="label">Số lượt báo cáo</div>
        <div class="value" style="color: #ff0000; font-weight: bold">{{ $post->report_count }} báo cáo</div>
      </div>

      <p style="margin-top: 24px">Nếu bạn cho rằng đây là nhầm lẫn, vui lòng liên hệ với admin để được hỗ trợ.</p>

      <div class="footer">
        <p>Email này được gửi tự động từ hệ thống CheckScam. Vui lòng không trả lời email này.</p>
        <p>© CheckScam — Cộng đồng MMO Việt Nam</p>
      </div>
    </div>
  </body>
</html>
