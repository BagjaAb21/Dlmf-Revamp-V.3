<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei Singkat - Deutsch Lernen Mit Fara</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .survey-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .survey-wrapper {
            max-width: 750px;
            width: 100%;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .survey-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.15);
            overflow: hidden;
        }

        .survey-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2.5rem 2.5rem 2rem;
            color: white;
            text-align: center;
            position: relative;
        }

        .survey-header .survey-emoji {
            font-size: 3rem;
            display: block;
            margin-bottom: 0.75rem;
        }

        .survey-header h3 {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .survey-header p {
            opacity: 0.9;
            font-size: 0.95rem;
            margin: 0;
            max-width: 500px;
            margin: 0 auto;
        }

        .survey-body {
            padding: 2.5rem;
        }

        .survey-question {
            margin-bottom: 2.5rem;
        }

        .survey-question:last-of-type {
            margin-bottom: 0;
        }

        .question-label {
            font-weight: 700;
            font-size: 1.05rem;
            color: #1a1a2e;
            margin-bottom: 0.4rem;
            display: flex;
            align-items: baseline;
            gap: 12px;
        }

        .q-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 0.8rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        .question-hint {
            font-size: 0.82rem;
            color: #9b9bbd;
            margin-bottom: 1.2rem;
            margin-left: 40px;
        }

        .options-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 0.75rem;
            margin-left: 40px;
        }

        .options-grid.two-col {
            grid-template-columns: 1fr 1fr;
        }

        .options-grid.single-col {
            grid-template-columns: 1fr;
        }

        .survey-option {
            position: relative;
        }

        .survey-option input[type="radio"],
        .survey-option input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .survey-option label {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.8rem 1.1rem;
            border: 2px solid #f1f1f5;
            border-radius: 14px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            color: #4b5563;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            background: #fff;
            user-select: none;
        }

        .survey-option label .option-dot {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #d1d5db;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .survey-option label .option-box {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            border: 2px solid #d1d5db;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .survey-option input[type="radio"]:checked+label,
        .survey-option input[type="checkbox"]:checked+label {
            border-color: #667eea;
            background: #f5f7ff;
            color: #4a4fd6;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.12);
        }

        .survey-option input[type="radio"]:checked+label .option-dot {
            border-color: #667eea;
            background: #667eea;
        }

        .survey-option input[type="radio"]:checked+label .option-dot::after {
            content: '';
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            display: block;
        }

        .survey-option input[type="checkbox"]:checked+label .option-box {
            border-color: #667eea;
            background: #667eea;
        }

        .survey-option input[type="checkbox"]:checked+label .option-box::after {
            content: '\2713';
            font-size: 12px;
            color: white;
            font-weight: 900;
        }

        .survey-option label:hover {
            border-color: #a0a8f8;
            background: #fafbff;
            transform: translateY(-1px);
        }

        .other-input {
            margin-top: 0.75rem;
            margin-left: 40px;
            display: none;
        }

        .other-input input {
            width: 100%;
            padding: 0.75rem 1.1rem;
            border: 2px solid #f1f1f5;
            border-radius: 12px;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .other-input input:focus {
            border-color: #667eea;
        }

        .btn-survey-submit {
            width: 100%;
            padding: 1.1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s;
            margin-top: 1rem;
            letter-spacing: 0.5px;
        }

        .btn-survey-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-survey-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .survey-divider {
            border: none;
            height: 1px;
            background: #f1f1f5;
            margin: 2.2rem 0;
            margin-left: 40px;
        }

        .alert-survey {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        @media (max-width: 640px) {
            .survey-body {
                padding: 1.5rem;
            }

            .survey-header {
                padding: 2rem 1.5rem;
            }

            .options-grid,
            .options-grid.two-col,
            .survey-divider,
            .question-hint,
            .other-input {
                margin-left: 0;
            }

            .options-grid,
            .options-grid.two-col {
                grid-template-columns: 1fr;
            }

            .q-number {
                width: 24px;
                height: 24px;
                font-size: 0.7rem;
            }
        }
    </style>
</head>

<body>
    <div class="survey-container">
        <div class="survey-wrapper">
            <div class="survey-card">
                <div class="survey-header">
                    <span class="survey-emoji">✨</span>
                    <h3>Satu Langkah Lagi!</h3>
                    <p>Bantu kami meningkatkan kualitas layanan dengan mengisi survei singkat 1 menit ini sebelum
                        melihat invoice Anda.</p>
                </div>

                <div class="survey-body">
                    @if (session('error'))
                        <div class="alert-survey">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('survey.store') }}" method="POST" id="surveyForm">
                        @csrf
                        @if (isset($payment))
                            <input type="hidden" name="external_id" value="{{ $payment->external_id }}">
                        @endif

                        {{-- Q1 --}}
                        <div class="survey-question">
                            <div class="question-label">
                                <span class="q-number">1</span>
                                Dari mana Anda pertama kali mengetahui program ini?
                            </div>
                            <p class="question-hint">Pilih satu jawaban</p>
                            <div class="options-grid two-col">
                                @foreach (['Instagram', 'TikTok', 'Google Search', 'Website', 'WhatsApp (Broadcast)', 'Teman / Referral', 'Sekolah / Kampus'] as $opt)
                                    <div class="survey-option">
                                        <input type="radio" name="q1_source" id="q1_{{ $loop->index }}"
                                            value="{{ $opt }}" required>
                                        <label for="q1_{{ $loop->index }}">
                                            <span class="option-dot"></span>{{ $opt }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <hr class="survey-divider">

                        {{-- Q2 --}}
                        <div class="survey-question">
                            <div class="question-label">
                                <span class="q-number">2</span>
                                Pertimbangan utama Anda saat memilih program?
                            </div>
                            <p class="question-hint">Boleh pilih maksimal 2 jawaban</p>
                            <div class="options-grid two-col" id="q2Grid">
                                @php
                                    $options = [
                                        'Harga',
                                        'Promo/Diskon',
                                        'Kualitas pengajar',
                                        'Jadwal',
                                        'Metode belajar',
                                        'Benefit',
                                        'Reputasi lembaga',
                                        'Lainnya',
                                    ];
                                @endphp
                                @foreach ($options as $opt)
                                    <div class="survey-option">
                                        <input type="checkbox" name="q2_considerations[]" id="q2_{{ $loop->index }}"
                                            value="{{ $opt }}" class="q2-checkbox">
                                        <label for="q2_{{ $loop->index }}">
                                            <span class="option-box"></span>{{ $opt }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="other-input" id="otherInput">
                                <input type="text" name="q2_other_text" id="q2_other_text"
                                    placeholder="Sebutkan pertimbangan lainnya..." maxlength="255">
                            </div>
                        </div>

                        <hr class="survey-divider">

                        {{-- Q3 --}}
                        <div class="survey-question">
                            <div class="question-label">
                                <span class="q-number">3</span>
                                Apakah Anda tertarik jika tersedia program lanjutan / private?
                            </div>
                            <p class="question-hint">Pilih satu jawaban</p>
                            <div class="options-grid single-col">
                                @foreach (['Ya, sangat tertarik', 'Mungkin', 'Tidak'] as $opt)
                                    <div class="survey-option">
                                        <input type="radio" name="q3_interest" id="q3_{{ $loop->index }}"
                                            value="{{ $opt }}" required>
                                        <label for="q3_{{ $loop->index }}">
                                            <span class="option-dot"></span>{{ $opt }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <hr class="survey-divider">

                        {{-- Q4 --}}
                        <div class="survey-question">
                            <div class="question-label">
                                <span class="q-number">4</span>
                                Rentang budget yang Anda siapkan?
                            </div>
                            <p class="question-hint">Pilih satu jawaban</p>
                            <div class="options-grid two-col">
                                @foreach (['< 1 jt', '1-3 jt', '3-5 jt', '> 5 jt'] as $opt)
                                    <div class="survey-option">
                                        <input type="radio" name="q4_budget" id="q4_{{ $loop->index }}"
                                            value="{{ $opt }}" required>
                                        <label for="q4_{{ $loop->index }}">
                                            <span class="option-dot"></span>{{ $opt }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn-survey-submit" id="surveySubmitBtn">
                            <i class="fas fa-paper-plane me-2"></i>Kirim & Lihat Detail Invoice
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Q2 logic: max 2 checkboxes + "Lainnya" input
        const q2Boxes = document.querySelectorAll('.q2-checkbox');
        const otherBox = document.getElementById('q2_7'); // "Lainnya" is at index 7
        const otherInput = document.getElementById('otherInput');

        function syncQ2() {
            const checked = Array.from(q2Boxes).filter(c => c.checked);
            q2Boxes.forEach(cb => {
                cb.disabled = checked.length >= 2 && !cb.checked;
            });
            if (otherInput) otherInput.style.display = otherBox && otherBox.checked ? 'block' : 'none';
        }

        q2Boxes.forEach(cb => cb.addEventListener('change', syncQ2));

        // Submit logic
        const surveyForm = document.getElementById('surveyForm');
        surveyForm.addEventListener('submit', function(e) {
            const checked = Array.from(q2Boxes).filter(c => c.checked);
            if (checked.length === 0) {
                e.preventDefault();
                alert('Mohon pilih minimal 1 pertimbangan utama (Pertanyaan 2).');
                return;
            }
            const btn = document.getElementById('surveySubmitBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
        });
    </script>
</body>

</html>
