<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // GAME 1: SUSUN HURUF (50 Soal)
        // ==========================================
        $susunHuruf = [
            ['question_text' => 'Pusat tata surya kita adalah...', 'answer_key' => 'MATAHARI'],
            ['question_text' => 'Proses tumbuhan membuat makanan sendiri dengan bantuan cahaya...', 'answer_key' => 'FOTOSINTESIS'],
            ['question_text' => 'Zat hijau daun pada tumbuhan disebut...', 'answer_key' => 'KLOROFIL'],
            ['question_text' => 'Gaya tarik bumi yang membuat benda jatuh ke bawah...', 'answer_key' => 'GRAVITASI'],
            ['question_text' => 'Sistem pemerintahan dimana kekuasaan berada di tangan rakyat...', 'answer_key' => 'DEMOKRASI'],
            ['question_text' => 'Ibukota provinsi Jawa Timur adalah...', 'answer_key' => 'SURABAYA'],
            ['question_text' => 'Planet merah dalam tata surya kita...', 'answer_key' => 'MARS'],
            ['question_text' => 'Benua terkecil di dunia...', 'answer_key' => 'AUSTRALIA'],
            ['question_text' => 'Samudra terluas di dunia...', 'answer_key' => 'PASIFIK'],
            ['question_text' => 'Mata uang negara Jepang...', 'answer_key' => 'YEN'],
            ['question_text' => 'Unsur kimia penyusun utama udara yang kita hirup (lambang O)...', 'answer_key' => 'OKSIGEN'],
            ['question_text' => 'Organ tubuh yang berfungsi memompa darah...', 'answer_key' => 'JANTUNG'],
            ['question_text' => 'Organ yang berfungsi menyaring darah dan menghasilkan urin...', 'answer_key' => 'GINJAL'],
            ['question_text' => 'Bagian terkecil dari makhluk hidup...', 'answer_key' => 'SEL'],
            ['question_text' => 'Kerajaan Hindu tertua di Indonesia...', 'answer_key' => 'KUTAI'],
            ['question_text' => 'Sumpah yang diucapkan oleh Patih Gajah Mada...', 'answer_key' => 'PALAPA'],
            ['question_text' => 'Bapak Proklamator Indonesia selain Moh. Hatta...', 'answer_key' => 'SOEKARNO'],
            ['question_text' => 'Nama benua tempat letaknya negara Mesir...', 'answer_key' => 'AFRIKA'],
            ['question_text' => 'Sungai terpanjang di dunia yang ada di Afrika...', 'answer_key' => 'NIL'],
            ['question_text' => 'Gurun terluas di dunia...', 'answer_key' => 'SAHARA'],
            ['question_text' => 'Hewan mamalia terbesar di bumi...', 'answer_key' => 'PAUS'],
            ['question_text' => 'Hewan yang bisa mengubah warna kulitnya sesuai lingkungan...', 'answer_key' => 'BUNGLON'],
            ['question_text' => 'Bintang yang paling dekat dengan bumi...', 'answer_key' => 'MATAHARI'],
            ['question_text' => 'Planet terbesar di tata surya...', 'answer_key' => 'YUPITER'],
            ['question_text' => 'Senjata khas masyarakat Jawa Barat...', 'answer_key' => 'KUJANG'],
            ['question_text' => 'Alat musik bambu tradisional dari Jawa Barat...', 'answer_key' => 'ANGKLUNG'],
            ['question_text' => 'Kain tradisional Indonesia yang diakui UNESCO...', 'answer_key' => 'BATIK'],
            ['question_text' => 'Satuan ukuran energi yang sering tertulis pada kemasan makanan...', 'answer_key' => 'KALORI'],
            ['question_text' => 'Alat untuk mengukur suhu...', 'answer_key' => 'TERMOMETER'],
            ['question_text' => 'Alat untuk melihat benda-benda luar angkasa...', 'answer_key' => 'TELESKOP'],
            ['question_text' => 'Alat untuk melihat benda berukuran sangat kecil (mikroorganisme)...', 'answer_key' => 'MIKROSKOP'],
            ['question_text' => 'Perpindahan panas melalui zat perantara tanpa diikuti perpindahan partikelnya...', 'answer_key' => 'KONDUKSI'],
            ['question_text' => 'Gunung tertinggi di pulau Jawa...', 'answer_key' => 'SEMERU'],
            ['question_text' => 'Danau vulkanik terbesar di Indonesia...', 'answer_key' => 'TOBA'],
            ['question_text' => 'Tari tradisional asal Aceh yang gerakannya sangat cepat...', 'answer_key' => 'SAMAN'],
            ['question_text' => 'Suku asli yang mendiami pulau Bali...', 'answer_key' => 'BALI'],
            ['question_text' => 'Provinsi paling timur di Indonesia...', 'answer_key' => 'PAPUA'],
            ['question_text' => 'Candi bercorak Hindu terbesar di Indonesia...', 'answer_key' => 'PRAMBANAN'],
            ['question_text' => 'Candi bercorak Buddha terbesar di dunia...', 'answer_key' => 'BOROBUDUR'],
            ['question_text' => 'Pegunungan yang memisahkan benua Eropa dan Asia...', 'answer_key' => 'URAL'],
            ['question_text' => 'Zat yang memberikan warna merah pada darah...', 'answer_key' => 'HEMOGLOBIN'],
            ['question_text' => 'Cabang ilmu biologi yang mempelajari pewarisan sifat...', 'answer_key' => 'GENETIKA'],
            ['question_text' => 'Pencipta lagu kebangsaan Indonesia Raya (W.R. ...)', 'answer_key' => 'SUPRATMAN'],
            ['question_text' => 'Sistem operasi open-source berlogo pinguin...', 'answer_key' => 'LINUX'],
            ['question_text' => 'Satuan terkecil dari sebuah gambar digital...', 'answer_key' => 'PIKSEL'],
            ['question_text' => 'Bahasa markup untuk membuat struktur halaman web...', 'answer_key' => 'HTML'],
            ['question_text' => 'Bentuk pemerintahan negara Malaysia...', 'answer_key' => 'KERAJAAN'],
            ['question_text' => 'Garis khayal yang membelah bumi menjadi utara dan selatan...', 'answer_key' => 'KHATULISTIWA'],
            ['question_text' => 'Batu mulia hasil dari tekanan karbon ribuan tahun...', 'answer_key' => 'BERLIAN'],
            ['question_text' => 'Arsitektur deteksi objek yang sangat cepat dan terkenal di bidang Computer Vision...', 'answer_key' => 'YOLO'],
            ['question_text' => 'Alat pernapasan pada ikan laut maupun air tawar...', 'answer_key' => 'INSANG', 'options_data' => json_encode(['I','N','S','A','N','G'])],
            ['question_text' => 'Proses perubahan uap air menjadi titik-titik air...', 'answer_key' => 'KONDENSASI', 'options_data' => json_encode(['K','O','N','D','E','N','S','A','S','I'])],
            ['question_text' => 'Ibukota negara Korea Selatan...', 'answer_key' => 'SEOUL', 'options_data' => json_encode(['S','E','O','U','L'])],
            ['question_text' => 'Nama samudra yang memisahkan Afrika dan Australia...', 'answer_key' => 'HINDIA', 'options_data' => json_encode(['H','I','N','D','I','A'])],
            ['question_text' => 'Tulang pipa terbesar pada anatomi tubuh manusia...', 'answer_key' => 'PAHA', 'options_data' => json_encode(['P','A','H','A'])],
            ['question_text' => 'Satuan internasional untuk ukuran tegangan listrik...', 'answer_key' => 'VOLT', 'options_data' => json_encode(['V','O','L','T'])],
            ['question_text' => 'Satu-satunya benua di dunia yang tidak memiliki gurun pasir...', 'answer_key' => 'EROPA', 'options_data' => json_encode(['E','R','O','P','A'])],
            ['question_text' => 'Alat untuk mengukur getaran atau gempa bumi...', 'answer_key' => 'SEISMOGRAF', 'options_data' => json_encode(['S','E','I','S','M','O','G','R','A','F'])],
            ['question_text' => 'Kerajaan Islam pertama di nusantara (Samudra...)...', 'answer_key' => 'PASAI', 'options_data' => json_encode(['P','A','S','A','I'])],
            ['question_text' => 'Planet keenam dari matahari yang terkenal dengan cincinnya...', 'answer_key' => 'SATURNUS', 'options_data' => json_encode(['S','A','T','U','R','N','U','S'])],
            ['question_text' => 'Mamalia laut yang dikenal sangat ramah dan cerdas...', 'answer_key' => 'LUMBALUMBA', 'options_data' => json_encode(['L','U','M','B','A','L','U','M','B','A'])],
            ['question_text' => 'Protein alami yang menyusun kuku dan rambut manusia...', 'answer_key' => 'KERATIN', 'options_data' => json_encode(['K','E','R','A','T','I','N'])],
            ['question_text' => 'Ibukota dari provinsi Bali...', 'answer_key' => 'DENPASAR', 'options_data' => json_encode(['D','E','N','P','A','S','A','R'])],
            ['question_text' => 'Lagu daerah "Apuse" berasal dari pulau...', 'answer_key' => 'PAPUA', 'options_data' => json_encode(['P','A','P','U','A'])],
            ['question_text' => 'Peristiwa alam ketika bulan menutupi cahaya matahari...', 'answer_key' => 'GERHANA', 'options_data' => json_encode(['G','E','R','H','A','N','A'])],
            ['question_text' => 'Logam yang paling ringan, sering digunakan untuk baterai...', 'answer_key' => 'LITIUM', 'options_data' => json_encode(['L','I','T','I','U','M'])],
            ['question_text' => 'Gunung tertinggi di dunia yang berada di pegunungan Himalaya...', 'answer_key' => 'EVEREST', 'options_data' => json_encode(['E','V','E','R','E','S','T'])],
            ['question_text' => 'Gas yang dibutuhkan tumbuhan untuk proses fotosintesis...', 'answer_key' => 'KARBONDIOKSIDA', 'options_data' => json_encode(['K','A','R','B','O','N','D','I','O','K','S','I','D','A'])],
            ['question_text' => 'Negara Asia Tenggara yang mendapat julukan Negeri Gajah Putih...', 'answer_key' => 'THAILAND', 'options_data' => json_encode(['T','H','A','I','L','A','N','D'])],
            ['question_text' => 'Pahlawan nasional asal Maluku yang memegang senjata parang...', 'answer_key' => 'PATTIMURA', 'options_data' => json_encode(['P','A','T','T','I','M','U','R','A'])],
            ['question_text' => 'Organisme mikroskopis bersel tunggal...', 'answer_key' => 'AMUBA', 'options_data' => json_encode(['A','M','U','B','A'])],
            ['question_text' => 'Ilmu pengetahuan yang mempelajari bintang dan benda langit...', 'answer_key' => 'ASTRONOMI', 'options_data' => json_encode(['A','S','T','R','O','N','O','M','I'])],
            ['question_text' => 'Enzim di dalam mulut yang mengubah karbohidrat menjadi zat gula...', 'answer_key' => 'PTIALIN', 'options_data' => json_encode(['P','T','I','A','L','I','N'])],
            ['question_text' => 'Arah mata angin tempat terbenamnya matahari...', 'answer_key' => 'BARAT', 'options_data' => json_encode(['B','A','R','A','T'])],
            ['question_text' => 'Tempat bertemunya aliran air sungai dengan air laut...', 'answer_key' => 'MUARA', 'options_data' => json_encode(['M','U','A','R','A'])],
            ['question_text' => 'Proses bergeraknya bumi mengelilingi matahari disebut...', 'answer_key' => 'REVOLUSI', 'options_data' => json_encode(['R','E','V','O','L','U','S','I'])],
            ['question_text' => 'Pulau tempat letaknya ibu kota baru Nusantara (IKN)...', 'answer_key' => 'KALIMANTAN', 'options_data' => json_encode(['K','A','L','I','M','A','N','T','A','N'])],
            ['question_text' => 'Ibukota negara Filipina...', 'answer_key' => 'MANILA', 'options_data' => json_encode(['M','A','N','I','L','A'])],
            ['question_text' => 'Sebutan lain untuk zaman batu tua adalah...', 'answer_key' => 'PALEOLITIKUM', 'options_data' => json_encode(['P','A','L','E','O','L','I','T','I','K','U','M'])],
            ['question_text' => 'Sifat magnet jika dua kutub senama didekatkan akan saling...', 'answer_key' => 'TOLAK', 'options_data' => json_encode(['T','O','L','A','K'])],
            ['question_text' => 'Tarian daerah dari Ponorogo yang menggunakan topeng kepala singa...', 'answer_key' => 'REOG', 'options_data' => json_encode(['R','E','O','G'])],
            ['question_text' => 'Hewan yang bisa hidup di dua alam (air dan darat) disebut...', 'answer_key' => 'AMFIBI', 'options_data' => json_encode(['A','M','F','I','B','I'])],
            ['question_text' => 'Alat musik petik tradisional yang berasal dari Pulau Rote...', 'answer_key' => 'SASANDO', 'options_data' => json_encode(['S','A','S','A','N','D','O'])],
            ['question_text' => 'Selat jalur perdagangan sibuk yang memisahkan pulau Sumatera dan Malaysia...', 'answer_key' => 'MALAKA', 'options_data' => json_encode(['M','A','L','A','K','A'])],
            ['question_text' => 'Mata uang resmi dari negara Inggris adalah...', 'answer_key' => 'POUNDSTERLING', 'options_data' => json_encode(['P','O','U','N','D','S','T','E','R','L','I','N','G'])],
            ['question_text' => 'Tokoh ilmuwan penemu telepon (Alexander Graham ...)', 'answer_key' => 'BELL', 'options_data' => json_encode(['B','E','L','L'])],
            ['question_text' => 'Penyakit gusi berdarah akibat kekurangan vitamin C disebut...', 'answer_key' => 'SKORBUT', 'options_data' => json_encode(['S','K','O','R','B','U','T'])],
            ['question_text' => 'Hewan endemik khas Pulau Sulawesi yang menyerupai babi bertaring...', 'answer_key' => 'BABIRUSA', 'options_data' => json_encode(['B','A','B','I','R','U','S','A'])],
            ['question_text' => 'Hewan asli benua Australia yang bergerak dengan cara melompat...', 'answer_key' => 'KANGGURU', 'options_data' => json_encode(['K','A','N','G','G','U','R','U'])],
            ['question_text' => 'Istilah biologi untuk kelompok hewan pemakan daging...', 'answer_key' => 'KARNIVORA', 'options_data' => json_encode(['K','A','R','N','I','V','O','R','A'])],
            ['question_text' => 'Istilah untuk tumbuhan jati yang menggugurkan daunnya di musim kemarau...', 'answer_key' => 'MERANGGAS', 'options_data' => json_encode(['M','E','R','A','N','G','G','A','S'])],
            ['question_text' => 'Pakaian adat wanita yang terkenal dari daerah Jawa...', 'answer_key' => 'KEBAYA', 'options_data' => json_encode(['K','E','B','A','Y','A'])],
            ['question_text' => 'Senjata tusuk tradisional asal pulau Jawa yang bilahnya berkelok-kelok...', 'answer_key' => 'KERIS', 'options_data' => json_encode(['K','E','R','I','S'])],
            ['question_text' => 'Rumah adat khas suku Toraja di Sulawesi Selatan...', 'answer_key' => 'TONGKONAN', 'options_data' => json_encode(['T','O','N','G','K','O','N','A','N'])],
            ['question_text' => 'Cabang olahraga yang menggunakan raket dan shuttlecock...', 'answer_key' => 'BULUTANGKIS', 'options_data' => json_encode(['B','U','L','U','T','A','N','G','K','I','S'])],
            ['question_text' => 'Singkatan dari Organisasi Kesehatan Dunia milik PBB...', 'answer_key' => 'WHO', 'options_data' => json_encode(['W','H','O'])],
            ['question_text' => 'Proses penyesuaian diri makhluk hidup terhadap lingkungannya...', 'answer_key' => 'ADAPTASI', 'options_data' => json_encode(['A','D','A','P','T','A','S','I'])],
            ['question_text' => 'Warna yang dihasilkan dari pencampuran pigmen biru dan kuning...', 'answer_key' => 'HIJAU', 'options_data' => json_encode(['H','I','J','A','U'])],
            ['question_text' => 'Bagian terdalam sel biologi yang berfungsi sebagai pusat kontrol...', 'answer_key' => 'NUKLEUS', 'options_data' => json_encode(['N','U','K','L','E','U','S'])],
            ['question_text' => 'Sistem penulisan berupa titik dan garis yang digunakan dalam pramuka...', 'answer_key' => 'MORSE', 'options_data' => json_encode(['M','O','R','S','E'])],
        ];

        // Format otomatis Susun Huruf ke dalam JSON Array
        foreach ($susunHuruf as &$sh) {
            $sh['options_data'] = json_encode(str_split(str_replace(' ', '', strtoupper($sh['answer_key']))));
        }

        // ==========================================
        // GAME 2: TRIVIA QUIZ (100 Soal - Jawaban Diacak)
        // ==========================================
        $triviaQuiz = [
            ['question_text' => 'Siapakah penemu bola lampu pijar yang efektif dan komersial?', 'answer_key' => 'Thomas Edison', 'options_data' => ['Nikola Tesla', 'Thomas Edison', 'Alexander G. Bell', 'Albert Einstein']],
            ['question_text' => 'Negara manakah yang memenangkan Piala Dunia FIFA pertama kali pada tahun 1930?', 'answer_key' => 'Uruguay', 'options_data' => ['Uruguay', 'Brazil', 'Argentina', 'Jerman']],
            ['question_text' => 'Apa nama ibukota dari negara Australia?', 'answer_key' => 'Canberra', 'options_data' => ['Sydney', 'Melbourne', 'Perth', 'Canberra']],
            ['question_text' => 'Logam apakah yang berwujud cair pada suhu ruangan?', 'answer_key' => 'Raksa', 'options_data' => ['Emas', 'Raksa', 'Perak', 'Tembaga']],
            ['question_text' => 'Hewan nasional dari negara Tiongkok adalah...', 'answer_key' => 'Panda', 'options_data' => ['Harimau', 'Singa', 'Panda', 'Komodo']],
            ['question_text' => 'Berapa jumlah provinsi di Indonesia saat ini (per 2024)?', 'answer_key' => '38', 'options_data' => ['34', '36', '37', '38']],
            ['question_text' => 'Planet manakah yang dikenal memiliki cincin paling terlihat dan indah?', 'answer_key' => 'Saturnus', 'options_data' => ['Saturnus', 'Venus', 'Mars', 'Uranus']],
            ['question_text' => 'Siapakah presiden ketiga Republik Indonesia?', 'answer_key' => 'B.J. Habibie', 'options_data' => ['Abdurrahman Wahid', 'B.J. Habibie', 'Megawati', 'Soeharto']],
            ['question_text' => 'Bahan utama pembuatan kaca adalah...', 'answer_key' => 'Pasir Silika', 'options_data' => ['Kapur', 'Tanah Liat', 'Pasir Silika', 'Belerang']],
            ['question_text' => 'Senjata tradisional khas suku Dayak adalah...', 'answer_key' => 'Mandau', 'options_data' => ['Mandau', 'Keris', 'Celurit', 'Rencong']],
            ['question_text' => 'Gas apa yang paling banyak terkandung di atmosfer bumi?', 'answer_key' => 'Nitrogen', 'options_data' => ['Oksigen', 'Hidrogen', 'Nitrogen', 'Karbon Dioksida']],
            ['question_text' => 'Universitas di Indonesia yang memiliki kampus di Margonda Depok dan Karawaci dengan almamater abu-abu adalah...', 'answer_key' => 'Universitas Gunadarma', 'options_data' => ['Universitas Indonesia', 'Universitas Gunadarma', 'Universitas Pancasila', 'Universitas Brawijaya']],
            ['question_text' => 'Peristiwa jatuhnya bom atom di Jepang saat Perang Dunia II terjadi di kota...', 'answer_key' => 'Hiroshima dan Nagasaki', 'options_data' => ['Tokyo dan Kyoto', 'Hiroshima dan Nagasaki', 'Osaka dan Kobe', 'Sapporo dan Fukuoka']],
            ['question_text' => 'Alat yang mengubah energi gerak menjadi energi listrik disebut...', 'answer_key' => 'Generator', 'options_data' => ['Dinamo', 'Generator', 'Transformator', 'Motor Listrik']],
            ['question_text' => 'Pulau Komodo terletak di provinsi...', 'answer_key' => 'Nusa Tenggara Timur', 'options_data' => ['Nusa Tenggara Barat', 'Bali', 'Nusa Tenggara Timur', 'Maluku']],
            ['question_text' => 'Zaman prasejarah dimana manusia purba sudah mulai bercocok tanam disebut zaman...', 'answer_key' => 'Neolitikum', 'options_data' => ['Paleolitikum', 'Mesolitikum', 'Neolitikum', 'Megalitikum']],
            ['question_text' => 'Hormon yang mengatur kadar gula darah dalam tubuh manusia adalah...', 'answer_key' => 'Insulin', 'options_data' => ['Adrenalin', 'Tiroksin', 'Insulin', 'Estrogen']],
            ['question_text' => 'Pencipta sistem operasi Windows adalah...', 'answer_key' => 'Bill Gates', 'options_data' => ['Steve Jobs', 'Mark Zuckerberg', 'Bill Gates', 'Linus Torvalds']],
            ['question_text' => 'Buku karangan R.A. Kartini yang terkenal adalah...', 'answer_key' => 'Habis Gelap Terbitlah Terang', 'options_data' => ['Layar Terkembang', 'Habis Gelap Terbitlah Terang', 'Salah Asuhan', 'Sitti Nurbaya']],
            ['question_text' => 'Tari Kecak merupakan kesenian tradisional dari daerah...', 'answer_key' => 'Bali', 'options_data' => ['Jawa Timur', 'Sumatera Barat', 'Bali', 'Kalimantan Tengah']],
            ['question_text' => 'Penyakit Anemia disebabkan oleh tubuh yang kekurangan...', 'answer_key' => 'Zat Besi', 'options_data' => ['Vitamin C', 'Kalsium', 'Zat Besi', 'Yodium']],
            ['question_text' => 'Siapakah pahlawan wanita dari Aceh yang memimpin perang gerilya?', 'answer_key' => 'Cut Nyak Dien', 'options_data' => ['Cut Meutia', 'Martha Christina Tiahahu', 'Cut Nyak Dien', 'Nyi Ageng Serang']],
            ['question_text' => 'Negara yang mendapat julukan Negeri Tirai Bambu adalah...', 'answer_key' => 'Tiongkok', 'options_data' => ['Tiongkok', 'Jepang', 'Korea Selatan', 'Vietnam']],
            ['question_text' => 'Pembangkit Listrik Tenaga Air (PLTA) memanfaatkan energi...', 'answer_key' => 'Kinetik', 'options_data' => ['Panas', 'Kinetik', 'Potensial', 'Kimia']],
            ['question_text' => 'Arah mata angin yang letaknya di antara Timur dan Selatan adalah...', 'answer_key' => 'Tenggara', 'options_data' => ['Barat Daya', 'Timur Laut', 'Tenggara', 'Barat Laut']],
            ['question_text' => 'Kelenjar terbesar dalam anatomi tubuh manusia adalah...', 'answer_key' => 'Hati', 'options_data' => ['Hati', 'Pankreas', 'Tiroid', 'Hipofisis']],
            ['question_text' => 'Perpindahan penduduk dari desa ke kota disebut...', 'answer_key' => 'Urbanisasi', 'options_data' => ['Transmigrasi', 'Imigrasi', 'Emigrasi', 'Urbanisasi']],
            ['question_text' => 'Tahun berapakah manusia pertama kali mendarat di bulan?', 'answer_key' => '1969', 'options_data' => ['1965', '1969', '1971', '1975']],
            ['question_text' => 'Mamalia yang bisa terbang adalah...', 'answer_key' => 'Kelelawar', 'options_data' => ['Burung Unta', 'Kelelawar', 'Tupai Terbang', 'Kasuari']],
            ['question_text' => 'Organisasi negara-negara pengekspor minyak bumi disebut...', 'answer_key' => 'OPEC', 'options_data' => ['ASEAN', 'PBB', 'OPEC', 'WHO']],
            ['question_text' => 'Tokoh yang menjahit bendera Sang Saka Merah Putih adalah...', 'answer_key' => 'Fatmawati', 'options_data' => ['R.A. Kartini', 'Fatmawati', 'Cut Nyak Dien', 'Dewi Sartika']],
            ['question_text' => 'Satuan untuk mengukur frekuensi bunyi adalah...', 'answer_key' => 'Hertz', 'options_data' => ['Watt', 'Joule', 'Newton', 'Hertz']],
            ['question_text' => 'Lagu daerah "Ampar-Ampar Pisang" berasal dari provinsi...', 'answer_key' => 'Kalimantan Selatan', 'options_data' => ['Kalimantan Timur', 'Kalimantan Selatan', 'Kalimantan Barat', 'Sulawesi Selatan']],
            ['question_text' => 'Framework PHP modern yang menggunakan pola arsitektur MVC dan sering digunakan saat ini adalah...', 'answer_key' => 'Laravel', 'options_data' => ['CodeIgniter', 'Symfony', 'Laravel', 'Lumen']],
            ['question_text' => 'Sungai Amazon, yang merupakan salah satu sungai terpanjang, mengalir di benua...', 'answer_key' => 'Amerika Selatan', 'options_data' => ['Amerika Utara', 'Amerika Selatan', 'Afrika', 'Asia']],
            ['question_text' => 'Unsur pembentuk tulang dan gigi yang paling utama adalah...', 'answer_key' => 'Kalsium', 'options_data' => ['Fosfor', 'Zat Besi', 'Kalsium', 'Kalium']],
            ['question_text' => 'Penulis naskah Proklamasi Kemerdekaan Indonesia adalah...', 'answer_key' => 'Soekarno, Hatta, Ahmad Soebardjo', 'options_data' => ['Soekarno, Hatta, Sutan Sjahrir', 'Soekarno, Sayuti Melik, B.M. Diah', 'Soekarno, Hatta, Ahmad Soebardjo', 'Soekarno, Sukarni, Chaerul Saleh']],
            ['question_text' => 'Nama selat yang memisahkan pulau Jawa dan pulau Sumatera adalah...', 'answer_key' => 'Sunda', 'options_data' => ['Karimata', 'Sunda', 'Madura', 'Malaka']],
            ['question_text' => 'Cahaya matahari sampai ke bumi dengan cara...', 'answer_key' => 'Radiasi', 'options_data' => ['Konduksi', 'Konveksi', 'Induksi', 'Radiasi']],
            ['question_text' => 'Bagian mata yang berfungsi mengatur jumlah cahaya yang masuk adalah...', 'answer_key' => 'Pupil', 'options_data' => ['Kornea', 'Lensa', 'Iris', 'Pupil']],
            ['question_text' => 'Patung Liberty yang berada di Amerika Serikat merupakan hadiah dari negara...', 'answer_key' => 'Prancis', 'options_data' => ['Inggris', 'Prancis', 'Spanyol', 'Jerman']],
            ['question_text' => 'Library machine learning open-source dari Meta yang disukai untuk riset Deep Learning adalah...', 'answer_key' => 'PyTorch', 'options_data' => ['TensorFlow', 'Scikit-learn', 'PyTorch', 'Keras']],
            ['question_text' => 'Garis bujur 0 derajat melewati sebuah kota di Inggris yang bernama...', 'answer_key' => 'Greenwich', 'options_data' => ['London', 'Greenwich', 'Manchester', 'Liverpool']],
            ['question_text' => 'Alat reproduksi jantan pada bunga disebut...', 'answer_key' => 'Benang Sari', 'options_data' => ['Putik', 'Mahkota', 'Kelopak', 'Benang Sari']],
            ['question_text' => 'Negara terluas di dunia berdasarkan total area geografisnya adalah...', 'answer_key' => 'Rusia', 'options_data' => ['Kanada', 'Tiongkok', 'Amerika Serikat', 'Rusia']],
            ['question_text' => 'Pemberontakan G30S/PKI terjadi pada tahun...', 'answer_key' => '1965', 'options_data' => ['1948', '1965', '1966', '1967']],
            ['question_text' => 'Proses perubahan wujud dari gas menjadi cair disebut...', 'answer_key' => 'Mengebun', 'options_data' => ['Mengkristal', 'Menyublim', 'Menguap', 'Mengebun']],
            ['question_text' => 'Hari Pendidikan Nasional diperingati setiap tanggal...', 'answer_key' => '2 Mei', 'options_data' => ['1 Juni', '2 Mei', '20 Mei', '10 November']],
            ['question_text' => 'Benua yang dijuluki sebagai "Benua Hitam" adalah...', 'answer_key' => 'Afrika', 'options_data' => ['Amerika', 'Eropa', 'Afrika', 'Australia']],
            ['question_text' => 'Tokoh yang menemukan gaya gravitasi karena melihat apel jatuh adalah...', 'answer_key' => 'Isaac Newton', 'options_data' => ['Albert Einstein', 'Isaac Newton', 'Galileo Galilei', 'Johannes Kepler']],
            ['question_text' => 'Perang Diponegoro melawan penjajah Belanda berlangsung pada kurun waktu...', 'answer_key' => '1825-1830', 'options_data' => json_encode(['1821-1825', '1825-1830', '1830-1835', '1840-1845'])],
            ['question_text' => 'Negara manakah yang menempati peringkat pertama jumlah penduduk terbanyak di dunia saat ini?', 'answer_key' => 'India', 'options_data' => json_encode(['Amerika Serikat', 'Tiongkok', 'India', 'Indonesia'])],
            ['question_text' => 'Siapakah seniman renaisans terkenal yang melukis karya legendaris "Monalisa"?', 'answer_key' => 'Leonardo da Vinci', 'options_data' => json_encode(['Vincent van Gogh', 'Pablo Picasso', 'Michelangelo', 'Leonardo da Vinci'])],
            ['question_text' => 'Gunung Krakatau yang meletus dahsyat pada tahun 1883 terletak di perairan...', 'answer_key' => 'Selat Sunda', 'options_data' => json_encode(['Selat Sunda', 'Selat Bali', 'Selat Malaka', 'Selat Makassar'])],
            ['question_text' => 'Bagian dari struktur tumbuhan yang berfungsi menyerap unsur hara dan air dari dalam tanah adalah...', 'answer_key' => 'Akar', 'options_data' => json_encode(['Batang', 'Akar', 'Daun', 'Ranting'])],
            ['question_text' => 'Tokoh penjelajah samudra yang diakui sebagai penemu benua Amerika pada tahun 1492 adalah...', 'answer_key' => 'Christopher Columbus', 'options_data' => json_encode(['Vasco da Gama', 'James Cook', 'Christopher Columbus', 'Ferdinand Magellan'])],
            ['question_text' => 'Benua paling dingin di dunia yang tertutup es abadi adalah...', 'answer_key' => 'Antartika', 'options_data' => json_encode(['Antartika', 'Eropa', 'Amerika Utara', 'Arktik'])],
            ['question_text' => 'Dalam tabel periodik kimia, unsur yang memiliki lambang "Fe" adalah...', 'answer_key' => 'Besi', 'options_data' => json_encode(['Fluor', 'Besi', 'Emas', 'Fosfor'])],
            ['question_text' => 'Kecepatan rambat cahaya di ruang hampa diperkirakan mencapai sekitar...', 'answer_key' => '300.000 km/detik', 'options_data' => json_encode(['100.000 km/detik', '200.000 km/detik', '300.000 km/detik', '400.000 km/detik'])],
            ['question_text' => 'Kota yang menjadi ibukota dari provinsi Kalimantan Timur adalah...', 'answer_key' => 'Samarinda', 'options_data' => json_encode(['Balikpapan', 'Pontianak', 'Banjarmasin', 'Samarinda'])],
            ['question_text' => 'Negara di benua Eropa yang identik dengan julukan Negara Kincir Angin adalah...', 'answer_key' => 'Belanda', 'options_data' => json_encode(['Jerman', 'Belanda', 'Denmark', 'Swiss'])],
            ['question_text' => 'Berapa jumlah kromosom standar yang terdapat pada sel tubuh manusia normal?', 'answer_key' => '46 Kromosom', 'options_data' => json_encode(['46 Kromosom', '48 Kromosom', '23 Kromosom', '24 Kromosom'])],
            ['question_text' => 'Kerajaan bercorak Buddha yang menjadi pusat maritim terbesar di Nusantara pada masa lampau adalah...', 'answer_key' => 'Sriwijaya', 'options_data' => json_encode(['Majapahit', 'Singasari', 'Sriwijaya', 'Tarumanegara'])],
            ['question_text' => 'Mata uang yang digunakan sebagai alat pembayaran sah di negara Thailand adalah...', 'answer_key' => 'Baht', 'options_data' => json_encode(['Ringgit', 'Peso', 'Dong', 'Baht'])],
            ['question_text' => 'Pahlawan proklamator yang juga dikenal sebagai Bapak Koperasi Indonesia adalah...', 'answer_key' => 'Moh. Hatta', 'options_data' => json_encode(['Soekarno', 'Moh. Hatta', 'Sutan Sjahrir', 'Ki Hajar Dewantara'])],
            ['question_text' => 'Dalam pelajaran kimia, senyawa dengan rumus H2O lebih dikenal sebagai...', 'answer_key' => 'Air', 'options_data' => json_encode(['Garam', 'Air', 'Udara', 'Gula'])],
            ['question_text' => 'Ibukota negara Rusia, yang juga merupakan kota terpadat di negara tersebut, adalah...', 'answer_key' => 'Moskow', 'options_data' => json_encode(['St. Petersburg', 'Kyiv', 'Moskow', 'Kazan'])],
            ['question_text' => 'Danau terbesar di dunia berdasarkan luas permukaannya adalah...', 'answer_key' => 'Laut Kaspia', 'options_data' => json_encode(['Danau Baikal', 'Laut Kaspia', 'Danau Victoria', 'Danau Superior'])],
            ['question_text' => 'Pahlawan nasional dari Sulawesi Selatan yang mendapat julukan Ayam Jantan dari Timur adalah...', 'answer_key' => 'Sultan Hasanuddin', 'options_data' => json_encode(['Pangeran Antasari', 'Sultan Agung', 'Sultan Hasanuddin', 'Teuku Umar'])],
            ['question_text' => 'Fisikawan jenius yang mencetuskan Teori Relativitas (E=mc²) adalah...', 'answer_key' => 'Albert Einstein', 'options_data' => json_encode(['Stephen Hawking', 'Albert Einstein', 'Isaac Newton', 'Niels Bohr'])],
            ['question_text' => 'Suku Bugis, yang terkenal dengan kapal Pinisi-nya, berasal dari provinsi...', 'answer_key' => 'Sulawesi Selatan', 'options_data' => json_encode(['Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara'])],
            ['question_text' => 'Hewan mamalia darat yang memegang rekor sebagai pelari tercepat di dunia adalah...', 'answer_key' => 'Cheetah', 'options_data' => json_encode(['Singa', 'Macan Tutul', 'Cheetah', 'Kuda'])],
            ['question_text' => 'Organisasi di bawah naungan PBB yang fokus mengurusi masalah pendidikan dan kebudayaan adalah...', 'answer_key' => 'UNESCO', 'options_data' => json_encode(['UNICEF', 'WHO', 'FAO', 'UNESCO'])],
            ['question_text' => 'Penyakit demam malaria ditularkan kepada manusia melalui perantara gigitan nyamuk...', 'answer_key' => 'Anopheles', 'options_data' => json_encode(['Aedes Aegypti', 'Anopheles', 'Culex', 'Mansonia'])],
            ['question_text' => 'Batuan yang terbentuk langsung dari cairan magma yang mendingin dan mengeras disebut...', 'answer_key' => 'Batuan Beku', 'options_data' => json_encode(['Batuan Sedimen', 'Batuan Metamorf', 'Batuan Kapur', 'Batuan Beku'])],
            ['question_text' => 'Pada tahun berapakah peristiwa runtuhnya Tembok Berlin di Jerman terjadi?', 'answer_key' => '1989', 'options_data' => json_encode(['1985', '1989', '1991', '1995'])],
            ['question_text' => 'Tari Piring, sebuah tarian tradisional yang atraktif menggunakan piring, berasal dari daerah...', 'answer_key' => 'Sumatera Barat', 'options_data' => json_encode(['Sumatera Utara', 'Sumatera Barat', 'Jawa Barat', 'Kalimantan Barat'])],
            ['question_text' => 'Cabang ilmu biologi yang secara khusus mempelajari tentang fosil dan kehidupan masa purba adalah...', 'answer_key' => 'Paleontologi', 'options_data' => json_encode(['Arkeologi', 'Antropologi', 'Paleontologi', 'Geologi'])],
            ['question_text' => 'Siapakah penulis novel fenomenal berjudul "Laskar Pelangi"?', 'answer_key' => 'Andrea Hirata', 'options_data' => json_encode(['Tere Liye', 'Raditya Dika', 'Pramoedya Ananta Toer', 'Andrea Hirata'])],
            ['question_text' => 'Pemain sepak bola legendaris yang memiliki julukan La Pulga dan berasal dari Argentina adalah...', 'answer_key' => 'Lionel Messi', 'options_data' => json_encode(['Diego Maradona', 'Cristiano Ronaldo', 'Lionel Messi', 'Neymar Jr'])],
            ['question_text' => 'Perubahan wujud benda dari bentuk padat yang langsung berubah menjadi gas disebut...', 'answer_key' => 'Menyublim', 'options_data' => json_encode(['Mengkristal', 'Menyublim', 'Menguap', 'Mencair'])],
            ['question_text' => 'Nama samudera luas yang terbentang tepat di sebelah barat pulau Sumatera adalah...', 'answer_key' => 'Samudera Hindia', 'options_data' => json_encode(['Samudera Pasifik', 'Samudera Atlantik', 'Samudera Arktik', 'Samudera Hindia'])],
            ['question_text' => 'Di negara Eropa manakah kamu bisa menemukan bangunan bersejarah Menara Miring Pisa?', 'answer_key' => 'Italia', 'options_data' => json_encode(['Prancis', 'Yunani', 'Italia', 'Spanyol'])],
            ['question_text' => 'Bahasa pemrograman yang paling wajib digunakan untuk membuat fungsi interaktif (pop-up, klik) di web browser adalah...', 'answer_key' => 'JavaScript', 'options_data' => json_encode(['Python', 'Java', 'C++', 'JavaScript'])],
            ['question_text' => 'Kumpulan gugusan bintang di angkasa yang membentuk suatu pola imajiner tertentu dinamakan...', 'answer_key' => 'Rasi Bintang', 'options_data' => json_encode(['Galaksi', 'Tata Surya', 'Rasi Bintang', 'Nebula'])],
            ['question_text' => 'Nama asli dari Bapak Pendidikan Nasional kita, Ki Hajar Dewantara, adalah...', 'answer_key' => 'Suwardi Suryaningrat', 'options_data' => json_encode(['Cipto Mangunkusumo', 'Setiabudi', 'Suwardi Suryaningrat', 'Wahid Hasyim'])],
            ['question_text' => 'Berapakah besar sudut di setiap sudut pada sebuah bangun datar segitiga sama sisi?', 'answer_key' => '60 Derajat', 'options_data' => json_encode(['45 Derajat', '60 Derajat', '90 Derajat', '180 Derajat'])],
            ['question_text' => 'Mata uang resmi yang disepakati untuk digunakan bersama di berbagai negara Uni Eropa adalah...', 'answer_key' => 'Euro', 'options_data' => json_encode(['Poundsterling', 'Dolar', 'Franc', 'Euro'])],
            ['question_text' => 'Kerajaan bercorak Hindu tertua yang pernah ditemukan di kepulauan Nusantara adalah kerajaan...', 'answer_key' => 'Kutai', 'options_data' => json_encode(['Kutai', 'Tarumanegara', 'Majapahit', 'Singasari'])],
            ['question_text' => 'Burung endemik yang memiliki bulu sangat indah dan menjadi maskot wilayah Papua adalah...', 'answer_key' => 'Cendrawasih', 'options_data' => json_encode(['Jalak Bali', 'Kasuari', 'Cendrawasih', 'Merak'])],
            ['question_text' => 'Siapakah musikus yang merupakan pencipta dari lagu kebangsaan "Maju Tak Gentar"?', 'answer_key' => 'Cornel Simanjuntak', 'options_data' => json_encode(['Ibu Sud', 'W.R. Supratman', 'Cornel Simanjuntak', 'Ismail Marzuki'])],
            ['question_text' => 'Benua di dunia yang sangat dingin sehingga tidak memiliki populasi penduduk asli secara menetap adalah...', 'answer_key' => 'Antartika', 'options_data' => json_encode(['Arktik', 'Greenland', 'Antartika', 'Siberia'])],
            ['question_text' => 'Partikel sub-atom yang paling kecil dan memiliki muatan listrik negatif disebut...', 'answer_key' => 'Elektron', 'options_data' => json_encode(['Proton', 'Neutron', 'Elektron', 'Quark'])],
            ['question_text' => 'Film animasi 3D panjang pertama di dunia yang dibuat sepenuhnya menggunakan teknologi CGI komputer adalah...', 'answer_key' => 'Toy Story', 'options_data' => json_encode(['Shrek', 'Finding Nemo', 'A Bug\'s Life', 'Toy Story'])],
            ['question_text' => 'Ibukota negara Spanyol yang juga merupakan markas dari klub sepak bola besar Real Madrid adalah...', 'answer_key' => 'Madrid', 'options_data' => json_encode(['Barcelona', 'Seville', 'Madrid', 'Valencia'])],
            ['question_text' => 'Lapisan gas di atmosfer bumi yang sangat penting karena berfungsi menyaring sinar ultraviolet berbahaya adalah lapisan...', 'answer_key' => 'Ozon', 'options_data' => json_encode(['Troposfer', 'Stratosfer', 'Ion', 'Ozon'])],
            ['question_text' => 'Reptil purba berukuran raksasa yang merupakan hewan endemik Indonesia di kepulauan Nusa Tenggara adalah...', 'answer_key' => 'Komodo', 'options_data' => json_encode(['Biawak', 'Buaya Muara', 'Iguana', 'Komodo'])],
            ['question_text' => 'Provinsi termuda di pulau Jawa yang ibu kotanya berada di Serang adalah...', 'answer_key' => 'Banten', 'options_data' => json_encode(['Jawa Barat', 'DKI Jakarta', 'Banten', 'Jawa Tengah'])],
            ['question_text' => 'Planet dalam tata surya kita yang dikenal karena rotasinya menyamping (menggelinding) adalah planet...', 'answer_key' => 'Uranus', 'options_data' => json_encode(['Neptunus', 'Venus', 'Saturnus', 'Uranus'])],
            ['question_text' => 'Dalam sistem komputer, komponen yang bertindak sebagai otak utama pemroses data (Central Processing Unit) disebut...', 'answer_key' => 'Prosesor', 'options_data' => json_encode(['RAM', 'Harddisk', 'Prosesor', 'Motherboard'])],
        ];


        // 1. FORMAT & ACAK OPSI SUSUN HURUF
        foreach ($susunHuruf as &$sh) {
            // Pecah jawaban menjadi array huruf
            $letters = str_split(str_replace(' ', '', strtoupper($sh['answer_key'])));
            
            // ACAK urutan hurufnya agar tidak berurutan membentuk jawaban
            shuffle($letters); 
            
            $sh['options_data'] = json_encode($letters);
        }

        // 2. FORMAT & ACAK OPSI TRIVIA QUIZ
        foreach ($triviaQuiz as &$tq) {
            $options = $tq['options_data'];
            
            // Cek apakah options berupa string (sudah kena json_encode dari atas)
            // Jika iya, kita bongkar dulu (decode) menjadi Array agar bisa diacak
            if (is_string($options)) {
                $options = json_decode($options, true);
            }
            
            // ACAK posisinya! Yang tadinya selalu di urutan ke-2, kini akan menyebar acak
            shuffle($options); 
            
            // Bungkus kembali (encode) menjadi string JSON untuk disimpan ke database
            $tq['options_data'] = json_encode($options);
        }

        // GABUNGKAN DAN MASUKKAN KE DATABASE
        $allQuestions = [];
        
        foreach ($susunHuruf as $q) {
            $allQuestions[] = [
                'game_id' => 1,
                'question_text' => $q['question_text'],
                'answer_key' => $q['answer_key'],
                'options_data' => $q['options_data'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach ($triviaQuiz as $q) {
            $allQuestions[] = [
                'game_id' => 2, 
                'question_text' => $q['question_text'],
                'answer_key' => $q['answer_key'],
                'options_data' => $q['options_data'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('questions')->insert($allQuestions);
    }
}