{{-- my-classes.blade.php --}}
<x-filament-panels::page>

{{-- ═══════════════════════════════════════════
     HEADER BANNER
═══════════════════════════════════════════ --}}
<div style="
    background:linear-gradient(135deg,#1E0A3C 0%,#4C1D95 50%,#7C3AED 100%);
    border-radius:20px;
    padding:1.75rem 2rem;
    display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;
    box-shadow:0 12px 36px rgba(124,58,237,0.32);
    position:relative;overflow:hidden;
">
    <div style="position:absolute;top:-50px;right:-50px;width:200px;height:200px;background:rgba(255,255,255,0.05);border-radius:50%;pointer-events:none;"></div>
    <div style="position:absolute;bottom:-30px;right:120px;width:100px;height:100px;background:rgba(255,255,255,0.04);border-radius:50%;pointer-events:none;"></div>

    {{-- Kiri: Title --}}
    <div style="display:flex;align-items:center;gap:1rem;position:relative;z-index:1;">
        <div style="width:50px;height:50px;min-width:50px;background:rgba(255,255,255,0.12);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;border:1.5px solid rgba(255,255,255,0.2);">
            📚
        </div>
        <div>
            <h1 style="font-family:'Poppins',sans-serif;font-size:clamp(1.1rem,3vw,1.4rem);font-weight:800;color:#fff;margin:0 0 0.2rem;line-height:1.25;">
                Kelas Saya
            </h1>
            <p style="font-size:0.82rem;color:rgba(255,255,255,0.75);margin:0;font-weight:400;">
                Semua kursus yang telah kamu daftarkan.
            </p>
        </div>
    </div>

    {{-- Kanan: CTA --}}
    <a href="/harga"
       style="display:inline-flex;align-items:center;gap:0.4rem;background:#FDE047;color:#4C1D95;border:none;padding:0.6rem 1.25rem;border-radius:10px;font-size:0.82rem;font-weight:700;text-decoration:none;position:relative;z-index:1;transition:all 0.2s;"
       onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 16px rgba(253,224,71,0.5)'"
       onmouseout="this.style.transform='';this.style.boxShadow=''">
        🛒 Lihat Paket Kursus
    </a>
</div>

{{-- ═══════════════════════════════════════════
     INFO BANNER
═══════════════════════════════════════════ --}}
<div style="display:flex;align-items:flex-start;gap:0.75rem;background:#F5F3FF;border:1px solid rgba(124,58,237,0.15);border-left:4px solid #7C3AED;border-radius:12px;padding:0.875rem 1.1rem;">
    <span style="font-size:1rem;line-height:1.5;flex-shrink:0;">ℹ️</span>
    <p style="margin:0;font-size:0.82rem;font-weight:500;color:#5B21B6;line-height:1.6;">
        Daftar semua kelas yang kamu miliki. Gunakan filter <strong>Status</strong> untuk melihat kelas aktif, berakhir, atau dibatalkan.
    </p>
</div>

{{-- ═══════════════════════════════════════════
     ENROLLMENT TABLE WIDGET
═══════════════════════════════════════════ --}}
<x-filament-widgets::widgets
    :widgets="$this->getEnrollmentWidgets()"
    :columns="$this->getFooterWidgetsColumns()" />

</x-filament-panels::page>
