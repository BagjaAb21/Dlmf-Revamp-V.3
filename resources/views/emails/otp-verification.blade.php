<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi DlmF</title>
</head>
<body style="margin:0;padding:0;background:#F0EBFF;font-family:'Segoe UI',Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#F0EBFF;padding:40px 16px;">
    <tr>
        <td align="center">
            <table width="520" cellpadding="0" cellspacing="0" style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 8px 32px rgba(124,58,237,0.12);">

                <!-- Header -->
                <tr>
                    <td style="background:linear-gradient(135deg,#7C3AED 0%,#5B21B6 100%);padding:32px 40px;text-align:center;">
                        <p style="margin:0;font-size:1.5rem;font-weight:800;color:#fff;letter-spacing:-0.5px;">DlmF — Area Siswa</p>
                        <p style="margin:6px 0 0;font-size:0.85rem;color:rgba(255,255,255,0.75);">Verifikasi Email Anda</p>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:36px 40px;">
                        <p style="margin:0 0 8px;font-size:1rem;font-weight:600;color:#111827;">Halo, {{ $userName }} 👋</p>
                        <p style="margin:0 0 28px;font-size:0.9rem;color:#6B7280;line-height:1.6;">
                            Terima kasih sudah mendaftar di <strong style="color:#7C3AED;">DlmF</strong>.
                            Masukkan kode verifikasi berikut untuk mengaktifkan akun Anda:
                        </p>

                        <!-- OTP Box -->
                        <div style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);border:2px solid #C4B5FD;border-radius:16px;padding:28px;text-align:center;margin-bottom:28px;">
                            <p style="margin:0 0 6px;font-size:0.72rem;font-weight:700;color:#7C3AED;letter-spacing:0.12em;text-transform:uppercase;">Kode OTP Anda</p>
                            <p style="margin:0;font-size:2.8rem;font-weight:800;color:#5B21B6;letter-spacing:0.35em;">{{ $otp }}</p>
                        </div>

                        <!-- Timer warning -->
                        <div style="display:flex;align-items:flex-start;background:#FFF7ED;border:1px solid #FED7AA;border-left:4px solid #F97316;border-radius:10px;padding:12px 16px;margin-bottom:24px;">
                            <p style="margin:0;font-size:0.82rem;color:#92400E;line-height:1.5;">
                                ⏱ Kode ini hanya berlaku selama <strong>10 menit</strong> sejak email ini terkirim.
                                Jangan bagikan kode ini kepada siapapun.
                            </p>
                        </div>

                        <p style="margin:0;font-size:0.82rem;color:#9CA3AF;line-height:1.6;">
                            Jika Anda tidak mendaftar di DlmF, abaikan email ini. Akun tidak akan dibuat tanpa verifikasi.
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#F9F7FF;border-top:1px solid #EDE9FE;padding:20px 40px;text-align:center;">
                        <p style="margin:0;font-size:0.75rem;color:#9CA3AF;">
                            © {{ date('Y') }} DlmF — Learning Management. <br>
                            Email ini dikirim secara otomatis, mohon tidak membalas.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
