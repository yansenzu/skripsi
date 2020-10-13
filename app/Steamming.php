<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\katadasar;

class Steamming extends Model
{
    function hapusTandaBaca($text)
    { // remove punctuation (Bagian CaseFolding)
        return preg_replace('/[.,!;:?�()*]|"/', '', $text);
    }

    function hapusTandaSimbol($text)
    { // Hapus Simbol (Bagian CaseFolding)
        return preg_replace('/[�@#$%^&*{};<>|“”]|[\/]|[-_+`~]/', ' ', $text);
    }

    function hapusAngka($text)
    { // remove punctuation (Bagian CaseFolding)
        return preg_replace('/[0123456789]/', '', $text);
    }

    function konversiKeHurufKecil($text)
    { // convert to lowercase (Bagian CaseFolding)
        return strtolower($text);
    }

    function memecahKata($text)
    { // memecah menjadi perkata (Bagian Tokenization)
        return explode(' ', $text);
    }

    function hapusKataGanda($text)
    {
        return array_unique($text);
    }

    function susunHasilHapusKataGanda($text)
    {
        return array_values($text);
    }
    function hapusSpasi($text)
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $text);
    }
    function susunKata($text)
    {
        return implode("", $text);
    }

    function potongKata($text, $awal, $panjang)
    {
        return substr($text, $awal, $panjang);
    }

    function hapusKataSambung($text)
    {
        $kataSambung = array("ada", "adalah", "adanya", "adapun", "agak", "agaknya", "agar", "akan", "akankah", "akhir", "akhiri", "akhirnya", "aku", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "antara", "antaranya", "apa", "apaan", "apabila", "apakah", "apalagi", "apatah", "artinya", "asal", "asalkan", "atas", "atau", "ataukah", "ataupun", "awal", "awalnya", "bagai", "bagaikan", "bagaimana", "bagaimanakah", "bagaimanapun", "bagi", "bagian", "bahkan", "bahwa", "bahwasanya", "bakal", "bakalan", "balik", "banyak", "bapak", "baru", "bawah", "beberapa", "begini", "beginian", "beginikah", "beginilah", "begitu", "begitukah", "begitulah", "begitupun", "bekerja", "belakang", "belakangan", "belum", "belumlah", "benar", "benarkah", "benarlah", "berada", "berakhir", "berakhirlah", "berakhirnya", "berapa", "berapakah", "berapalah", "berapapun", "berarti", "berawal", "berbagai", "berdatangan", "beri", "berikan", "berikut", "berikutnya", "berjumlah", "berkali-kali", "berkata", "berkehendak", "berkeinginan", "berkenaan", "berlainan", "berlalu", "berlangsung", "berlebihan", "bermacam", "bermacam-macam", "bermaksud", "bermula", "bersama", "bersama-sama", "bersiap", "bersiap-siap", "bertanya", "bertanya-tanya", "berturut", "berturut-turut", "bertutur", "berujar", "berupa", "besar", "betul", "betulkah", "biasa", "biasanya", "bila", "bilakah", "bisa", "bisakah", "boleh", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "bulan", "bung", "cara", "caranya", "cukup", "cukupkah", "cukuplah", "cuma", "dahulu", "dalam", "dan", "dapat", "dari", "daripada", "datang", "dekat", "demi", "demikian", "demikianlah", "dengan", "depan", "di", "dia", "diakhiri", "diakhirinya", "dialah", "diantara", "diantaranya", "diberi", "diberikan", "diberikannya", "dibuat", "dibuatnya", "didapat", "didatangkan", "digunakan", "diibaratkan", "diibaratkannya", "diingat", "diingatkan", "diinginkan", "dijawab", "dijelaskan", "dijelaskannya", "dikarenakan", "dikatakan", "dikatakannya", "dikerjakan", "diketahui", "diketahuinya", "dikira", "dilakukan", "dilalui", "dilihat", "dimaksud", "dimaksudkan", "dimaksudkannya", "dimaksudnya", "diminta", "dimintai", "dimisalkan", "dimulai", "dimulailah", "dimulainya", "dimungkinkan", "dini", "dipastikan", "diperbuat", "diperbuatnya", "dipergunakan", "diperkirakan", "diperlihatkan", "diperlukan", "diperlukannya", "dipersoalkan", "dipertanyakan", "dipunyai", "diri", "dirinya", "disampaikan", "disebut", "disebutkan", "disebutkannya", "disini", "disinilah", "ditambahkan", "ditandaskan", "ditanya", "ditanyai", "ditanyakan", "ditegaskan", "ditujukan", "ditunjuk", "ditunjuki", "ditunjukkan", "ditunjukkannya", "ditunjuknya", "dituturkan", "dituturkannya", "diucapkan", "diucapkannya", "diungkapkan", "dong", "dua", "dulu", "empat", "enggak", "enggaknya", "entah", "entahlah", "guna", "gunakan", "hal", "hampir", "hanya", "hanyalah", "hari", "harus", "haruslah", "harusnya", "hendak", "hendaklah", "hendaknya", "hingga", "ia", "ialah", "ibarat", "ibaratkan", "ibaratnya", "ibu", "ikut", "ingat", "ingat-ingat", "ingin", "inginkah", "inginkan", "ini", "inikah", "inilah", "itu", "itukah", "itulah", "jadi", "jadilah", "jadinya", "jangan", "jangankan", "janganlah", "jauh", "jawab", "jawaban", "jawabnya", "jelas", "jelaskan", "jelaslah", "jelasnya", "jika", "jikalau", "juga", "jumlah", "jumlahnya", "justru", "kala", "kalau", "kalaulah", "kalaupun", "kalian", "kami", "kamilah", "kamu", "kamulah", "kan", "kapan", "kapankah", "kapanpun", "karena", "karenanya", "kasus", "kata", "katakan", "katakanlah", "katanya", "ke", "keadaan", "kebetulan", "kecil", "kedua", "keduanya", "keinginan", "kelamaan", "kelihatan", "kelihatannya", "kelima", "keluar", "kembali", "kemudian", "kemungkinan", "kemungkinannya", "kenapa", "kepada", "kepadanya", "kesampaian", "keseluruhan", "keseluruhannya", "keterlaluan", "ketika", "khususnya", "kini", "kinilah", "kira", "kira-kira", "kiranya", "kita", "kitalah", "kok", "kurang", "lagi", "lagian", "lah", "lain", "lainnya", "lalu", "lama", "lamanya", "lanjut", "lanjutnya", "lebih", "lewat", "lima", "luar", "macam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "mana", "manakala", "manalagi", "masa", "masalah", "masalahnya", "masih", "masihkah", "masing", "masing-masing", "mau", "maupun", "melainkan", "melakukan", "melalui", "melihat", "melihatnya", "memang", "memastikan", "memberi", "memberikan", "membuat", "memerlukan", "memihak", "meminta", "memintakan", "memisalkan", "memperbuat", "mempergunakan", "memperkirakan", "memperlihatkan", "mempersiapkan", "mempersoalkan", "mempertanyakan", "mempunyai", "memulai", "memungkinkan", "menaiki", "menambahkan", "menandaskan", "menanti", "menanti-nanti", "menantikan", "menanya", "menanyai", "menanyakan", "mendapat", "mendapatkan", "mendatang", "mendatangi", "mendatangkan", "menegaskan", "mengakhiri", "mengapa", "mengatakan", "mengatakannya", "mengenai", "mengerjakan", "mengetahui", "menggunakan", "menghendaki", "mengibaratkan", "mengibaratkannya", "mengingat", "mengingatkan", "menginginkan", "mengira", "mengucapkan", "mengucapkannya", "mengungkapkan", "menjadi", "menjawab", "menjelaskan", "menuju", "menunjuk", "menunjuki", "menunjukkan", "menunjuknya", "menurut", "menuturkan", "menyampaikan", "menyangkut", "menyatakan", "menyebutkan", "menyeluruh", "menyiapkan", "merasa", "mereka", "merekalah", "merupakan", "meski", "meskipun", "meyakini", "meyakinkan", "minta", "mirip", "misal", "misalkan", "misalnya", "mula", "mulai", "mulailah", "mulanya", "mungkin", "mungkinkah", "nah", "naik", "namun", "nanti", "nantinya", "nyaris", "nyatanya", "oleh", "olehnya", "pada", "padahal", "padanya", "pak", "paling", "panjang", "pantas", "para", "pasti", "pastilah", "penting", "pentingnya", "per", "percuma", "perlu", "perlukah", "perlunya", "pernah", "persoalan", "pertama", "pertama-tama", "pertanyaan", "pertanyakan", "pihak", "pihaknya", "pukul", "pula", "pun", "punya", "rasa", "rasanya", "rata", "rupanya", "saat", "saatnya", "saja", "sajalah", "saling", "sama", "sama-sama", "sambil", "sampai", "sampai-sampai", "sampaikan", "sana", "sangat", "sangatlah", "satu", "saya", "sayalah", "se", "sebab", "sebabnya", "sebagai", "sebagaimana", "sebagainya", "sebagian", "sebaik", "sebaik-baiknya", "sebaiknya", "sebaliknya", "sebanyak", "sebegini", "sebegitu", "sebelum", "sebelumnya", "sebenarnya", "seberapa", "sebesar", "sebetulnya", "sebisanya", "sebuah", "sebut", "sebutlah", "sebutnya", "secara", "secukupnya", "sedang", "sedangkan", "sedemikian", "sedikit", "sedikitnya", "seenaknya", "segala", "segalanya", "segera", "seharusnya", "sehingga", "seingat", "sejak", "sejauh", "sejenak", "sejumlah", "sekadar", "sekadarnya", "sekali", "sekali-kali", "sekalian", "sekaligus", "sekalipun", "sekarang", "sekarang", "sekecil", "seketika", "sekiranya", "sekitar", "sekitarnya", "sekurang-kurangnya", "sekurangnya", "sela", "selain", "selaku", "selalu", "selama", "selama-lamanya", "selamanya", "selanjutnya", "seluruh", "seluruhnya", "semacam", "semakin", "semampu", "semampunya", "semasa", "semasih", "semata", "semata-mata", "semaunya", "sementara", "semisal", "semisalnya", "sempat", "semua", "semuanya", "semula", "sendiri", "sendirian", "sendirinya", "seolah", "seolah-olah", "seorang", "sepanjang", "sepantasnya", "sepantasnyalah", "seperlunya", "seperti", "sepertinya", "sepihak", "sering", "seringnya", "serta", "serupa", "sesaat", "sesama", "sesampai", "sesegera", "sesekali", "seseorang", "sesuatu", "sesuatunya", "sesudah", "sesudahnya", "setelah", "setempat", "setengah", "seterusnya", "setiap", "setiba", "setibanya", "setidak-tidaknya", "setidaknya", "setinggi", "seusai", "sewaktu", "siap", "siapa", "siapakah", "siapapun", "sini", "sinilah", "soal", "soalnya", "suatu", "sudah", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tahu", "tahun", "tak", "tambah", "tambahnya", "tampak", "tampaknya", "tandas", "tandasnya", "tanpa", "tanya", "tanyakan", "tanyanya", "tapi", "tegas", "tegasnya", "telah", "tempat", "tengah", "tentang", "tentu", "tentulah", "tentunya", "tepat", "terakhir", "terasa", "terbanyak", "terdahulu", "terdapat", "terdiri", "terhadap", "terhadapnya", "teringat", "teringat-ingat", "terjadi", "terjadilah", "terjadinya", "terkira", "terlalu", "terlebih", "terlihat", "termasuk", "ternyata", "tersampaikan", "tersebut", "tersebutlah", "tertentu", "tertuju", "terus", "terutama", "tetap", "tetapi", "tiap", "tiba", "tiba-tiba", "tidak", "tidakkah", "tidaklah", "tiga", "tinggi", "toh", "tunjuk", "turut", "tutur", "tuturnya", "ucap", "ucapnya", "ujar", "ujarnya", "umum", "umumnya", "ungkap", "ungkapnya", "untuk", "usah", "usai", "waduh", "wah", "wahai", "waktu", "waktunya", "walau", "walaupun", "wong", "yaitu", "yakin", "yakni", "yang", "ku");
        $temp = explode(" ", $text);
        $x = count($kataSambung);
        $a = count($temp);
        for ($i = 0; $i < $a; $i++) {
            for ($j = 0; $j < $x; $j++) {
                if ($temp[$i] == $kataSambung[$j]) {
                    $temp[$i] = "";
                }
            }
        }
        $hasil = null;
        for ($i = 0; $i < count($temp); $i++) {
            if ($temp[$i] == "") {
                $hasil = $hasil;
            } else {
                if ($i == 0) {
                    $hasil = $temp[$i];
                } else {
                    $hasil = $hasil . " " . $temp[$i];
                }
            }
        }

        return $hasil;
    }

    function hapusPartikel($kata)
    { // remove particel (hapus partikel)
        $text = katadasar::where('katadasar', $kata)->get();
        $cari = count($text);
        if ($cari != 1) {
            if ((substr($kata, -3) == 'kah') || (substr($kata, -3) == 'lah') || (substr($kata, -3) == 'pun')) {
                $kata = substr($kata, 0, -3);
            }
        }
        return $kata;
    }

    function hapusKataGantiMilik($kata)
    { // remove possesive pronoun (kata ganti milik)
        $text = katadasar::where('katadasar', $kata)->get();
        $cari = count($text);
        if ($cari != 1) {
            if (strlen($kata) > 4) {
                if ((substr($kata, -2) == 'ku') || (substr($kata, -2) == 'mu')) {
                    $kata = substr($kata, 0, -2);
                } else if ((substr($kata, -3) == 'nya')) {
                    $kata = substr($kata, 0, -3);
                }
            }
        }
        return $kata;
    }

    function hapusAwalanPertama($kata)
    {
        $text = katadasar::where('katadasar', $kata)->get();
        $cari = count($text);
        if ($cari != 1) {
            $temp = $kata;
            if (substr($kata, 0, 4) == "meng") {
                $kata = substr($kata, 4);
            } else if (substr($kata, 0, 4) == "meny") {
                $kata = "s" . substr($kata, 4);
            } else if (substr($kata, 0, 3) == "men") {
                if (substr($kata, 3, 1) == "a" || substr($kata, 3, 1) == "i" || substr($kata, 3, 1) == "e" || substr($kata, 3, 1) == "u" || substr($kata, 3, 1) == "o") {
                    $kata = "t" . substr($kata, 3);
                } else {
                    $kata = substr($kata, 3);
                }
            } else if (substr($kata, 0, 3) == "mem") {
                if (substr($kata, 3, 1) == "a" || substr($kata, 3, 1) == "i" || substr($kata, 3, 1) == "e" || substr($kata, 3, 1) == "u" || substr($kata, 3, 1) == "o") {
                    $kata = "p" . substr($kata, 3);
                } else {
                    $kata = substr($kata, 3);
                }
            } else if (substr($kata, 0, 2) == "me") {
                $kata = substr($kata, 2);
            } else if (substr($kata, 0, 4) == "peng") {
                $kata = substr($kata, 4);
            } else if (substr($kata, 0, 4) == "peny") {
                $kata = "s" . substr($kata, 4);
            } else if (substr($kata, 0, 3) == "pen") {
                $kata = substr($kata, 3);
            } else if (substr($kata, 0, 3) == "pem") {
                if (substr($kata, 3, 1) == "a" || substr($kata, 3, 1) == "i" || substr($kata, 3, 1) == "e" || substr($kata, 3, 1) == "u" || substr($kata, 3, 1) == "o") {
                    $kata = "p" . substr($kata, 3);
                } else {
                    $kata = substr($kata, 3);
                }
            } else if (substr($kata, 0, 2) == "di") {
                $kata = substr($kata, 2);
            } else if (substr($kata, 0, 3) == "ter") {
                $kata = substr($kata, 3);
            } else if (substr($kata, 0, 2) == "ke") {
                $kata = substr($kata, 2);
            }
        }

        return $kata;
    }

    function hapusAwalanKedua($kata)
    {
        $text = katadasar::where('katadasar', $kata)->get();
        $cari = count($text);
        if ($cari != 1) {
            $temp = $kata;
            if (substr($kata, 0, 3) == "ber") {
                $kata = substr($kata, 3);
            } else if (substr($kata, 0, 3) == "bel") {
                $kata = substr($kata, 3);
            } else if (substr($kata, 0, 2) == "be") {
                $kata = substr($kata, 2);
            } else if (substr($kata, 0, 3) == "per") {
                $kata = substr($kata, 3);
            } else if (substr($kata, 0, 2) == "pe") {
                $kata = substr($kata, 2);
            }
        }

        return $kata;
    }

    function hapusAkhiran($kata)
    {
        $text = katadasar::where('katadasar', $kata)->get();
        $cari = count($text);
        if ($cari != 1) {
            $temp = $kata;
            if (substr($kata, -3) == "kan") {
                $kata = substr($kata, 0, -3);
            } else if (substr($kata, -2) == "an") {
                $kata = substr($kata, 0, -2);
            } else if (substr($kata, -1) == "i") {
                $kata = substr($kata, 0, -1);
            }
        }

        return $kata;
    }
}
