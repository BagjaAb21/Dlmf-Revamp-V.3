<?php

namespace App\Data;

/**
 * Data lengkap wilayah Indonesia: 38 Provinsi + Kabupaten/Kota
 * Sumber: Kemendagri – digunakan untuk dropdown form profil siswa.
 */
class IndonesiaRegions
{
    /**
     * Semua provinsi sebagai [key => label] untuk Select Filament.
     */
    public static function provinces(): array
    {
        return [
            'Aceh'                      => 'Aceh',
            'Sumatera Utara'            => 'Sumatera Utara',
            'Sumatera Barat'            => 'Sumatera Barat',
            'Riau'                      => 'Riau',
            'Jambi'                     => 'Jambi',
            'Sumatera Selatan'          => 'Sumatera Selatan',
            'Bengkulu'                  => 'Bengkulu',
            'Lampung'                   => 'Lampung',
            'Kepulauan Bangka Belitung' => 'Kepulauan Bangka Belitung',
            'Kepulauan Riau'            => 'Kepulauan Riau',
            'DKI Jakarta'               => 'DKI Jakarta',
            'Jawa Barat'                => 'Jawa Barat',
            'Jawa Tengah'               => 'Jawa Tengah',
            'DI Yogyakarta'             => 'DI Yogyakarta',
            'Jawa Timur'                => 'Jawa Timur',
            'Banten'                    => 'Banten',
            'Bali'                      => 'Bali',
            'Nusa Tenggara Barat'       => 'Nusa Tenggara Barat',
            'Nusa Tenggara Timur'       => 'Nusa Tenggara Timur',
            'Kalimantan Barat'          => 'Kalimantan Barat',
            'Kalimantan Tengah'         => 'Kalimantan Tengah',
            'Kalimantan Selatan'        => 'Kalimantan Selatan',
            'Kalimantan Timur'          => 'Kalimantan Timur',
            'Kalimantan Utara'          => 'Kalimantan Utara',
            'Sulawesi Utara'            => 'Sulawesi Utara',
            'Sulawesi Tengah'           => 'Sulawesi Tengah',
            'Sulawesi Selatan'          => 'Sulawesi Selatan',
            'Sulawesi Tenggara'         => 'Sulawesi Tenggara',
            'Gorontalo'                 => 'Gorontalo',
            'Sulawesi Barat'            => 'Sulawesi Barat',
            'Maluku'                    => 'Maluku',
            'Maluku Utara'              => 'Maluku Utara',
            'Papua Barat'               => 'Papua Barat',
            'Papua Barat Daya'          => 'Papua Barat Daya',
            'Papua'                     => 'Papua',
            'Papua Selatan'             => 'Papua Selatan',
            'Papua Tengah'              => 'Papua Tengah',
            'Papua Pegunungan'          => 'Papua Pegunungan',
        ];
    }

    /**
     * Kabupaten/Kota per provinsi.
     * Mengembalikan [] jika provinsi tidak ditemukan.
     */
    public static function cities(string $province): array
    {
        $map = self::cityMap();
        $list = $map[$province] ?? [];
        return array_combine($list, $list);
    }

    /**
     * Peta Provinsi → [Kabupaten/Kota]
     */
    private static function cityMap(): array
    {
        return [
            'Aceh' => [
                'Kota Banda Aceh','Kota Sabang','Kota Langsa','Kota Lhokseumawe','Kota Subulussalam',
                'Kab. Aceh Besar','Kab. Pidie','Kab. Pidie Jaya','Kab. Bireuen','Kab. Aceh Utara',
                'Kab. Aceh Timur','Kab. Aceh Tamiang','Kab. Gayo Lues','Kab. Aceh Tengah',
                'Kab. Bener Meriah','Kab. Aceh Tenggara','Kab. Aceh Selatan','Kab. Aceh Singkil',
                'Kab. Simeulue','Kab. Nagan Raya','Kab. Aceh Jaya','Kab. Aceh Barat','Kab. Aceh Barat Daya',
            ],
            'Sumatera Utara' => [
                'Kota Medan','Kota Binjai','Kota Tebing Tinggi','Kota Pematangsiantar','Kota Tanjung Balai',
                'Kota Sibolga','Kota Padangsidimpuan','Kota Gunungsitoli',
                'Kab. Deli Serdang','Kab. Langkat','Kab. Karo','Kab. Simalungun','Kab. Asahan',
                'Kab. Labuhanbatu','Kab. Labuhanbatu Utara','Kab. Labuhanbatu Selatan','Kab. Tapanuli Utara',
                'Kab. Tapanuli Tengah','Kab. Tapanuli Selatan','Kab. Padang Lawas','Kab. Padang Lawas Utara',
                'Kab. Toba','Kab. Samosir','Kab. Humbang Hasundutan','Kab. Pakpak Bharat','Kab. Dairi',
                'Kab. Batubara','Kab. Serdang Bedagai','Kab. Mandailing Natal','Kab. Nias',
                'Kab. Nias Barat','Kab. Nias Utara','Kab. Nias Selatan',
            ],
            'Sumatera Barat' => [
                'Kota Padang','Kota Bukittinggi','Kota Payakumbuh','Kota Solok','Kota Sawahlunto',
                'Kota Padang Panjang','Kota Pariaman',
                'Kab. Agam','Kab. Lima Puluh Kota','Kab. Pasaman','Kab. Pasaman Barat',
                'Kab. Tanah Datar','Kab. Padang Pariaman','Kab. Pesisir Selatan','Kab. Sijunjung',
                'Kab. Dharmasraya','Kab. Solok','Kab. Solok Selatan','Kab. Kepulauan Mentawai',
            ],
            'Riau' => [
                'Kota Pekanbaru','Kota Dumai',
                'Kab. Kampar','Kab. Rokan Hulu','Kab. Rokan Hilir','Kab. Bengkalis','Kab. Siak',
                'Kab. Pelalawan','Kab. Indragiri Hulu','Kab. Indragiri Hilir','Kab. Kuantan Singingi',
                'Kab. Kepulauan Meranti',
            ],
            'Jambi' => [
                'Kota Jambi','Kota Sungai Penuh',
                'Kab. Batanghari','Kab. Muaro Jambi','Kab. Bungo','Kab. Tebo','Kab. Sarolangun',
                'Kab. Merangin','Kab. Kerinci','Kab. Tanjung Jabung Timur','Kab. Tanjung Jabung Barat',
            ],
            'Sumatera Selatan' => [
                'Kota Palembang','Kota Lubuklinggau','Kota Prabumulih','Kota Pagar Alam',
                'Kab. Ogan Ilir','Kab. Ogan Komering Ilir','Kab. Ogan Komering Ulu','Kab. OKU Selatan',
                'Kab. OKU Timur','Kab. Banyuasin','Kab. Musi Banyuasin','Kab. Musi Rawas',
                'Kab. Musi Rawas Utara','Kab. Empat Lawang','Kab. Lahat','Kab. Muara Enim',
                'Kab. Penukal Abab Lematang Ilir',
            ],
            'Bengkulu' => [
                'Kota Bengkulu',
                'Kab. Bengkulu Utara','Kab. Bengkulu Tengah','Kab. Bengkulu Selatan','Kab. Rejang Lebong',
                'Kab. Kepahiang','Kab. Lebong','Kab. Seluma','Kab. Kaur','Kab. Mukomuko',
            ],
            'Lampung' => [
                'Kota Bandar Lampung','Kota Metro',
                'Kab. Lampung Selatan','Kab. Lampung Tengah','Kab. Lampung Utara','Kab. Lampung Barat',
                'Kab. Lampung Timur','Kab. Tanggamus','Kab. Pringsewu','Kab. Pesawaran',
                'Kab. Mesuji','Kab. Tulang Bawang','Kab. Tulang Bawang Barat','Kab. Way Kanan',
                'Kab. Pesisir Barat',
            ],
            'Kepulauan Bangka Belitung' => [
                'Kota Pangkalpinang',
                'Kab. Bangka','Kab. Bangka Barat','Kab. Bangka Tengah','Kab. Bangka Selatan',
                'Kab. Belitung','Kab. Belitung Timur',
            ],
            'Kepulauan Riau' => [
                'Kota Batam','Kota Tanjungpinang',
                'Kab. Bintan','Kab. Karimun','Kab. Lingga','Kab. Natuna','Kab. Kepulauan Anambas',
            ],
            'DKI Jakarta' => [
                'Kota Jakarta Pusat','Kota Jakarta Utara','Kota Jakarta Barat',
                'Kota Jakarta Selatan','Kota Jakarta Timur','Kab. Kepulauan Seribu',
            ],
            'Jawa Barat' => [
                'Kota Bandung','Kota Bekasi','Kota Depok','Kota Bogor','Kota Cimahi',
                'Kota Cirebon','Kota Sukabumi','Kota Tasikmalaya','Kota Banjar',
                'Kab. Bandung','Kab. Bandung Barat','Kab. Bekasi','Kab. Bogor','Kab. Ciamis',
                'Kab. Cianjur','Kab. Cirebon','Kab. Garut','Kab. Indramayu','Kab. Karawang',
                'Kab. Kuningan','Kab. Majalengka','Kab. Pangandaran','Kab. Purwakarta',
                'Kab. Subang','Kab. Sukabumi','Kab. Sumedang','Kab. Tasikmalaya','Kab. Pangandaran',
            ],
            'Jawa Tengah' => [
                'Kota Semarang','Kota Solo','Kota Salatiga','Kota Magelang','Kota Pekalongan',
                'Kota Tegal',
                'Kab. Banjarnegara','Kab. Banyumas','Kab. Batang','Kab. Blora','Kab. Boyolali',
                'Kab. Brebes','Kab. Cilacap','Kab. Demak','Kab. Grobogan','Kab. Jepara',
                'Kab. Karanganyar','Kab. Kebumen','Kab. Kendal','Kab. Klaten','Kab. Kudus',
                'Kab. Magelang','Kab. Pati','Kab. Pekalongan','Kab. Pemalang','Kab. Purbalingga',
                'Kab. Purworejo','Kab. Rembang','Kab. Semarang','Kab. Sragen','Kab. Sukoharjo',
                'Kab. Tegal','Kab. Temanggung','Kab. Wonogiri','Kab. Wonosobo',
            ],
            'DI Yogyakarta' => [
                'Kota Yogyakarta',
                'Kab. Bantul','Kab. Gunung Kidul','Kab. Kulon Progo','Kab. Sleman',
            ],
            'Jawa Timur' => [
                'Kota Surabaya','Kota Malang','Kota Batu','Kota Blitar','Kota Kediri','Kota Madiun',
                'Kota Mojokerto','Kota Pasuruan','Kota Probolinggo',
                'Kab. Bangkalan','Kab. Banyuwangi','Kab. Blitar','Kab. Bojonegoro','Kab. Bondowoso',
                'Kab. Gresik','Kab. Jember','Kab. Jombang','Kab. Kediri','Kab. Lamongan',
                'Kab. Lumajang','Kab. Madiun','Kab. Magetan','Kab. Malang','Kab. Mojokerto',
                'Kab. Nganjuk','Kab. Ngawi','Kab. Pacitan','Kab. Pamekasan','Kab. Pasuruan',
                'Kab. Ponorogo','Kab. Probolinggo','Kab. Sampang','Kab. Sidoarjo','Kab. Situbondo',
                'Kab. Sumenep','Kab. Trenggalek','Kab. Tuban','Kab. Tulungagung',
            ],
            'Banten' => [
                'Kota Serang','Kota Cilegon','Kota Tangerang','Kota Tangerang Selatan',
                'Kab. Serang','Kab. Lebak','Kab. Pandeglang','Kab. Tangerang',
            ],
            'Bali' => [
                'Kota Denpasar',
                'Kab. Badung','Kab. Bangli','Kab. Buleleng','Kab. Gianyar','Kab. Jembrana',
                'Kab. Karangasem','Kab. Klungkung','Kab. Tabanan',
            ],
            'Nusa Tenggara Barat' => [
                'Kota Mataram','Kota Bima',
                'Kab. Lombok Barat','Kab. Lombok Tengah','Kab. Lombok Timur','Kab. Lombok Utara',
                'Kab. Sumbawa','Kab. Sumbawa Barat','Kab. Dompu','Kab. Bima',
            ],
            'Nusa Tenggara Timur' => [
                'Kota Kupang',
                'Kab. Kupang','Kab. Timor Tengah Selatan','Kab. Timor Tengah Utara','Kab. Belu',
                'Kab. Alor','Kab. Lembata','Kab. Flores Timur','Kab. Sikka','Kab. Ende',
                'Kab. Ngada','Kab. Nagekeo','Kab. Manggarai','Kab. Manggarai Barat','Kab. Manggarai Timur',
                'Kab. Sumba Barat','Kab. Sumba Timur','Kab. Sumba Tengah','Kab. Sumba Barat Daya',
                'Kab. Rote Ndao','Kab. Sabu Raijua','Kab. Malaka',
            ],
            'Kalimantan Barat' => [
                'Kota Pontianak','Kota Singkawang',
                'Kab. Pontianak','Kab. Kubu Raya','Kab. Mempawah','Kab. Sambas','Kab. Bengkayang',
                'Kab. Landak','Kab. Sanggau','Kab. Sekadau','Kab. Sintang','Kab. Melawi',
                'Kab. Kapuas Hulu','Kab. Kayong Utara','Kab. Ketapang',
            ],
            'Kalimantan Tengah' => [
                'Kota Palangka Raya',
                'Kab. Kotawaringin Barat','Kab. Kotawaringin Timur','Kab. Kapuas','Kab. Katingan',
                'Kab. Seruyan','Kab. Sukamara','Kab. Lamandau','Kab. Gunung Mas','Kab. Pulang Pisau',
                'Kab. Murung Raya','Kab. Barito Utara','Kab. Barito Selatan','Kab. Barito Timur',
            ],
            'Kalimantan Selatan' => [
                'Kota Banjarmasin','Kota Banjarbaru',
                'Kab. Banjar','Kab. Barito Kuala','Kab. Tapin','Kab. Hulu Sungai Selatan',
                'Kab. Hulu Sungai Tengah','Kab. Hulu Sungai Utara','Kab. Balangan','Kab. Tabalong',
                'Kab. Kotabaru','Kab. Tanah Laut','Kab. Tanah Bumbu',
            ],
            'Kalimantan Timur' => [
                'Kota Samarinda','Kota Balikpapan','Kota Bontang',
                'Kab. Kutai Kartanegara','Kab. Kutai Timur','Kab. Kutai Barat','Kab. Berau',
                'Kab. Paser','Kab. Penajam Paser Utara','Kab. Mahakam Ulu',
            ],
            'Kalimantan Utara' => [
                'Kota Tarakan',
                'Kab. Bulungan','Kab. Malinau','Kab. Nunukan','Kab. Tana Tidung',
            ],
            'Sulawesi Utara' => [
                'Kota Manado','Kota Bitung','Kota Tomohon','Kota Kotamobagu',
                'Kab. Minahasa','Kab. Minahasa Utara','Kab. Minahasa Selatan','Kab. Minahasa Tenggara',
                'Kab. Bolaang Mongondow','Kab. Bolaang Mongondow Utara','Kab. Bolaang Mongondow Timur',
                'Kab. Bolaang Mongondow Selatan','Kab. Kepulauan Sangihe','Kab. Kepulauan Talaud',
                'Kab. Kepulauan Siau Tagulandang Biaro',
            ],
            'Sulawesi Tengah' => [
                'Kota Palu',
                'Kab. Donggala','Kab. Sigi','Kab. Parigi Moutong','Kab. Poso','Kab. Tojo Una-Una',
                'Kab. Banggai','Kab. Banggai Kepulauan','Kab. Banggai Laut','Kab. Morowali',
                'Kab. Morowali Utara','Kab. Toli-Toli','Kab. Buol',
            ],
            'Sulawesi Selatan' => [
                'Kota Makassar','Kota Palopo','Kota Parepare',
                'Kab. Gowa','Kab. Takalar','Kab. Jeneponto','Kab. Bantaeng','Kab. Bulukumba',
                'Kab. Selayar','Kab. Sinjai','Kab. Bone','Kab. Soppeng','Kab. Wajo',
                'Kab. Sidrap','Kab. Pinrang','Kab. Enrekang','Kab. Tana Toraja','Kab. Toraja Utara',
                'Kab. Luwu','Kab. Luwu Utara','Kab. Luwu Timur','Kab. Maros','Kab. Pangkajene dan Kepulauan',
                'Kab. Barru',
            ],
            'Sulawesi Tenggara' => [
                'Kota Kendari','Kota Baubau',
                'Kab. Konawe','Kab. Konawe Selatan','Kab. Konawe Utara','Kab. Konawe Kepulauan',
                'Kab. Kolaka','Kab. Kolaka Utara','Kab. Kolaka Timur','Kab. Bombana',
                'Kab. Buton','Kab. Buton Selatan','Kab. Buton Tengah','Kab. Buton Utara',
                'Kab. Muna','Kab. Muna Barat','Kab. Wakatobi',
            ],
            'Gorontalo' => [
                'Kota Gorontalo',
                'Kab. Gorontalo','Kab. Gorontalo Utara','Kab. Bone Bolango','Kab. Pohuwato','Kab. Boalemo',
            ],
            'Sulawesi Barat' => [
                'Kab. Mamuju','Kab. Mamuju Tengah','Kab. Mamasa','Kab. Polewali Mandar',
                'Kab. Majene','Kab. Pasangkayu',
            ],
            'Maluku' => [
                'Kota Ambon','Kota Tual',
                'Kab. Maluku Tengah','Kab. Maluku Tenggara','Kab. Maluku Barat Daya','Kab. Kepulauan Tanimbar',
                'Kab. Seram Bagian Barat','Kab. Seram Bagian Timur','Kab. Kepulauan Aru','Kab. Buru',
                'Kab. Buru Selatan',
            ],
            'Maluku Utara' => [
                'Kota Ternate','Kota Tidore Kepulauan',
                'Kab. Halmahera Barat','Kab. Halmahera Tengah','Kab. Halmahera Selatan',
                'Kab. Halmahera Timur','Kab. Halmahera Utara','Kab. Kepulauan Sula',
                'Kab. Pulau Morotai','Kab. Pulau Taliabu',
            ],
            'Papua Barat' => [
                'Kota Sorong',
                'Kab. Sorong','Kab. Sorong Selatan','Kab. Raja Ampat','Kab. Manokwari',
                'Kab. Manokwari Selatan','Kab. Pegunungan Arfak','Kab. Teluk Bintuni',
                'Kab. Teluk Wondama','Kab. Kaimana',
            ],
            'Papua Barat Daya' => [
                'Kota Sorong',
                'Kab. Sorong','Kab. Sorong Selatan','Kab. Raja Ampat','Kab. Maybrat','Kab. Tambrauw',
            ],
            'Papua' => [
                'Kota Jayapura',
                'Kab. Jayapura','Kab. Keerom','Kab. Sarmi','Kab. Mamberamo Raya','Kab. Waropen',
                'Kab. Kepulauan Yapen','Kab. Biak Numfor','Kab. Supiori',
            ],
            'Papua Selatan' => [
                'Kota Merauke',
                'Kab. Merauke','Kab. Boven Digoel','Kab. Mappi','Kab. Asmat',
            ],
            'Papua Tengah' => [
                'Kab. Nabire','Kab. Paniai','Kab. Puncak Jaya','Kab. Puncak','Kab. Deiyai',
                'Kab. Dogiyai','Kab. Intan Jaya',
            ],
            'Papua Pegunungan' => [
                'Kab. Jayawijaya','Kab. Tolikara','Kab. Mamberamo Tengah','Kab. Yalimo',
                'Kab. Lanny Jaya','Kab. Nduga','Kab. Pegunungan Bintang',
            ],
        ];
    }
}
