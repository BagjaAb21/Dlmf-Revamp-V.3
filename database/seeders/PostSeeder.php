<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin Blog',
                'email' => 'admin@dlmf.com',
                'password' => bcrypt('password'),
            ]);
        }

        $categories = Category::all();
        if ($categories->isEmpty()) {
            $this->call(CategorySeeder::class);
            $categories = Category::all();
        }

        $posts = [
            [
                'title' => 'Cara Cepat Belajar Bahasa Jerman untuk Pemula',
                'excerpt' => 'Belajar bahasa Jerman tidak sesulit yang dibayangkan. Berikut adalah beberapa tips efektif untuk memulainya.',
                'content' => 'Belajar bahasa Jerman memang memiliki tantangan tersendiri, terutama pada tata bahasa atau grammar. Namun, dengan metode yang tepat, Anda bisa menguasainya lebih cepat. Fokuslah pada kosakata dasar, dengarkan podcast bahasa Jerman, dan jangan takut untuk berbicara meskipun salah.',
                'status' => 'published',
            ],
            [
                'title' => 'Mengapa Harus Belajar di DLMF?',
                'excerpt' => 'DLMF menawarkan pengalaman belajar yang berbeda dengan metode interaktif dan pengajar berpengalaman.',
                'content' => 'Deutsch Lernen Mit Frau (DLMF) bukan sekadar tempat kursus biasa. Kami memiliki kurikulum yang disesuaikan dengan standar Eropa (CEFR) dan pengajar yang memiliki pengalaman tinggal di Jerman. Fasilitas modern dan komunitas yang suportif akan membantu Anda mencapai target belajar.',
                'status' => 'published',
            ],
            [
                'title' => 'Mengenal Budaya Kerja di Jerman',
                'excerpt' => 'Kedisiplinan dan profesionalisme adalah kunci utama jika Anda ingin berkarir di Jerman.',
                'content' => 'Orang Jerman sangat menghargai waktu (Pünktlichkeit). Selain itu, komunikasi yang langsung dan jujur (Direktheit) sangat dijunjung tinggi di lingkungan profesional. Memahami etika kerja ini sangat penting bagi mereka yang berencana mengikuti program Au Pair atau Ausbildung.',
                'status' => 'published',
            ],
            [
                'title' => 'Persiapan Ujian Goethe Zertifikat A1',
                'excerpt' => 'Panduan lengkap bagi Anda yang ingin lulus ujian sertifikat bahasa Jerman tingkat dasar.',
                'content' => 'Ujian Goethe Zertifikat A1 terdiri dari empat bagian: Hören (Mendengar), Lesen (Membaca), Schreiben (Menulis), dan Sprechen (Berbicara). Pastikan Anda sering berlatih dengan soal-soal simulasi dan memperkaya kosakata seputar tema sehari-hari.',
                'status' => 'published',
            ],
            [
                'title' => 'Tips Mencari Beasiswa Study di Jerman',
                'excerpt' => 'Jerman adalah salah satu destinasi studi terpopuler. Simak cara mendapatkan beasiswa ke sana.',
                'content' => 'Pemerintah Jerman melalui DAAD menyediakan berbagai skema beasiswa bagi mahasiswa internasional. Selain itu, banyak yayasan swasta yang juga menawarkan dukungan finansial. Syarat utamanya biasanya adalah kemampuan bahasa Jerman yang mumpuni serta prestasi akademik yang baik.',
                'status' => 'published',
            ],
            [
                'title' => 'Perbedaan Dialek dalam Bahasa Jerman',
                'excerpt' => 'Meskipun ada bahasa Jerman standar (Hochdeutsch), Anda akan menemukan berbagai dialek yang unik.',
                'content' => 'Dari Bayerisch di selatan hingga Plattdeutsch di utara, Jerman memiliki kekayaan linguistik yang luar biasa. Memahami dialek dasar akan sangat membantu jika Anda tinggal di daerah tersebut, meskipun Hochdeutsch tetap digunakan secara resmi di seluruh negeri.',
                'status' => 'published',
            ],
            [
                'title' => 'Kuliner Khas Jerman yang Wajib Dicoba',
                'excerpt' => 'Bukan hanya Bratwurst, Jerman punya banyak hidangan lezat lainnya.',
                'content' => 'Coba juga Schnitzel, Sauerbraten, atau Bretzel yang ikonik. Jangan lupa mencicipi berbagai macam roti khas Jerman yang jumlahnya mencapai ratusan jenis. Setiap daerah biasanya memiliki makanan khas yang unik dan autentik.',
                'status' => 'published',
            ],
            [
                'title' => 'Manfaat Mengikuti Program Au Pair',
                'excerpt' => 'Pengalaman berharga tinggal bersama keluarga Jerman sambil belajar bahasa dan budaya.',
                'content' => 'Sebagai Au Pair, Anda akan mendapatkan kesempatan untuk tinggal di Jerman secara gratis sebagai bagian dari keluarga angkat. Anda akan membantu pekerjaan ringan rumah tangga dan menjaga anak-anak, sementara mendapatkan uang saku dan waktu untuk kursus bahasa.',
                'status' => 'published',
            ],
            [
                'title' => 'Cara Meningkatkan Kosakata Bahasa Jerman',
                'excerpt' => 'Gunakan teknik flashcards dan konsumsi konten media Jerman setiap hari.',
                'content' => 'Membaca berita di DW atau menonton film di Netflix dengan subtitle bahasa Jerman adalah cara yang asyik untuk belajar. Cobalah untuk mencatat kata-kata baru dan menggunakannya dalam kalimat sehari-hari agar lebih mudah diingat.',
                'status' => 'published',
            ],
            [
                'title' => 'Panduan Transportasi Umum di Jerman',
                'excerpt' => 'Sistem transportasi yang efisien namun kadang membingungkan bagi pendatang baru.',
                'content' => 'Jerman memiliki jaringan kereta (Deutsche Bahn) yang luas serta sistem transportasi dalam kota yang terintegrasi (U-Bahn, S-Bahn, Tram). Membeli kartu langganan bulanan biasanya jauh lebih hemat bagi mahasiswa atau pekerja.',
                'status' => 'published',
            ],
            [
                'title' => 'Kesalahan Umum Saat Berbicara Bahasa Jerman',
                'excerpt' => 'Hati-hati dengan gender kata benda dan posisi kata kerja dalam kalimat.',
                'content' => 'Salah satu kesulitan terbesar adalah menentukan Der, Die, atau Das. Selain itu, posisi kata kerja yang sering berpindah ke akhir kalimat dalam kalimat majemuk sering membuat bingung. Jangan menyerah, konsistensi adalah kunci!',
                'status' => 'published',
            ],
            [
                'title' => 'Pengalaman Tinggal di Berlin Sebagai Mahasiswa',
                'excerpt' => 'Berlin adalah kota yang dinamis, kreatif, dan penuh dengan sejarah.',
                'content' => 'Sebagai pusat budaya Jerman, Berlin menawarkan gaya hidup yang seru namun tetap terjangkau bagi mahasiswa dibandingkan kota besar lainnya seperti München. Banyaknya kampus ternama dan peluang kerja paruh waktu menjadikannya pilihan favorit.',
                'status' => 'published',
            ],
        ];

        foreach ($posts as $index => $postData) {
            Post::create([
                'title' => $postData['title'],
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'status' => $postData['status'],
                'thumbnail' => 'https://picsum.photos/seed/blog-' . ($index + 1) . '/800/600',
                'category_id' => $categories->random()->id,
                'user_id' => $user->id,
                'published_at' => Carbon::now()->subDays(rand(1, 30)),
            ]);
        }
    }
}
