<?php

//Constructor Property Promatioan // sınıf içinde değişkenleri tanımlayıp constructor’da atamak yerine tek satırda hepsini halletmeni
class User { //php 7
    public string $name;
    public int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

class User {
    public function __construct(
        public string $name,
        public int $age
    ) {}
}


//switch ve match arasındaki fark switchte break kullanımı varken matche de yok. Mach defautl bir değer istiyo. Vemrzsek hata veriyor.

switch ($status) {
    case 200:
        $message = 'OK';
        break;
    case 404:
        $message = 'Not Found';
        break;
    default:
        $message = 'Unknown Status';
        break;
}

// match (daha temiz)
$status=200; //default bir değer vermek zorunluluğu var
$message = match ($status) {
    200 => 'OK',
    404 => 'Not Found',
    default => 'Unknown Status',
};

//nullsafe(?->) nesneye erişimde null kontrolünü kolaylaştırır.
//BÖYLE BİR DURUMDA user boş ise php hatası alanıyor.
$city = $user->getAddress()->getCity();
//bunu önlemek için nullsafe operatötü kullanılıyor.
$city = $user?->getAddress()?->getCity(); //$user veya getAddress() null ise, zincirleme durur, $city null olur. HATA VERMEZ
$street = $user?->address?->street;//ARA NESNELER NULL İSE HATA VERMEZ DEĞERİ NUL YAPAR


//Named Arguments (İsimli Argümanlar)

//Fonksiyon veya metod çağırırken, parametreleri isimleriyle belirterek daha okunabilir ve esnek kod yazmak.
//Sadece fonksiyon veya metod çağrılarında kullanılır
function setConfig(string $host, int $port = 80, bool $useSSL = false) {
    echo "Host: $host, Port: $port, SSL: " . ($useSSL ? 'Yes' : 'No');
}

// Sadece SSL’i değiştir:
setConfig(host: "example.com", useSSL: true);

function createUser(string $name, int $age, bool $isAdmin = false) {
    echo "Name: $name, Age: $age, Admin: " . ($isAdmin ? 'Yes' : 'No');
}
//SIRASININDA KARIŞIKLIK OLSA BİLE AGE NAME OLARAK TANIMLANDIĞINDA DOLAYI HATA VERMEZ VE
createUser(age: 25, name: "Ayşe", isAdmin: true);

//JIT (just in time) //performans artıırıcı kodun kritik kısımlarını daha makiine diline çevirere çalıştırma

function calculatePrimeNumbers(int $limit): array {
    $primes = [];
    for ($i = 2; $i < $limit; $i++) {
        $isPrime = true;
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j === 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            $primes[] = $i;
        }
    }
    return $primes;
}

$start = microtime(true);
$primes = calculatePrimeNumbers(50000);
$end = microtime(true);

echo "Toplam asal sayı: " . count($primes) . "\n";
echo "Süre: " . ($end - $start) . " saniye\n";

//php.ini dosyasında
//jit kapalı
//opcache.enable=1
//opcache.jit=0

//jit açık
//opcache.enable=1
//opcache.jit=1235
//opcache.jit_buffer_size=100M


//30/08/2025

//1)Enums:versiyon 8.1

//8.1 den önce kullanılan yapı  Aşağıdaki kullanımda $status = 'drfat' yazılı bir değer geldiğinde php uygulamadan çıkana kadar php bunu farketmiş.
class Status {
    const Draft = 'draft';
    const Published = 'published';
    const Archived = 'archived';
}
$status = Status::Draft;

if ($status === Status::Draft) {
    echo "Bu içerik taslak.";
}
//enums kullanımu:“Status” adında bir tipim var, bu sadece Draft, Published veya Archived olabilir. Başka hiçbir şey olamaz.
//Aşağıdaki kullanımda $status = 'drfat' şeklinde bir değer geldiğinde php hemen hata veriri.
//BU kullanım Hatalı string kullanımı engeller
enum Status {
    case Draft;
    case Published;
    case Archived;
}
$status = Status::Draft;

if ($status === Status::Draft) {
    echo "Bu içerik taslak.";
}
//Kullanıcı Rollerinde
//Bu şekilde yanlışlıkla $role = "admin"; gibi string veremezsin.
//Sadece UserRole::Admin, UserRole::Editor veya UserRole::Viewer olabilir.
enum UserRole {
    case Admin;
    case Editor;
    case Viewer;
}

function canEdit(UserRole $role): bool {
    return $role === UserRole::Admin || $role === UserRole::Editor;
}

// Kullanım:
$role = UserRole::Viewer;

if (canEdit($role)) {
    echo "Düzenleme yapabilir.";
} else {
    echo "Düzenleme yetkisi yok.";
}
//Api kullanımında
enum Gender {
    case Male;
    case Female;
    case Other;
}

function saveUser(string $name, Gender $gender): void {
    echo "Kullanıcı: $name, Cinsiyet: {$gender->name}";
}

saveUser("Hasan", Gender::Male);
// ✅ Çalışır

saveUser("Ayşe", "kadın");
//hata verir string kabul etmez

//Backend Enums
enum UserRole: string {
    case Admin = 'admin';
    case Editor = 'editor';
    case Viewer = 'viewer';
}

function getRoleLabel(UserRole $role): string {
    return match($role) {
        UserRole::Admin => 'Yönetici',
        UserRole::Editor => 'Editör',
        UserRole::Viewer => 'Görüntüleyici',
    };
}

// Kullanım:
$role = UserRole::Admin;

echo $role->value; // "admin"
echo getRoleLabel($role); // "Yönetici"

//Enm içinde metod yazma:
//switch/match ifadelerini her yerde tekrar tekrar yazmazsın.

enum OrderStatus: string {
    case Pending = 'pending';
    case Paid = 'paid';
    case Shipped = 'shipped';
    case Cancelled = 'cancelled';

    public function label(): string {
        return match($this) {
            self::Pending   => 'Beklemede',
            self::Paid      => 'Ödendi',
            self::Shipped   => 'Kargoya verildi',
            self::Cancelled => 'İptal edildi',
        };
    }
}

// Kullanım:
$status = OrderStatus::Shipped;  //değeri shipped
echo $status->label(); // "Kargoya verildi" label fonsinonu Shipped değerinş gönderiyor

//INTERFACE
//TrafficLight enum’u HasColor interface’ini implemente ediyor.

//Bu sayede her case için color() metodu zorunlu hale geliyor.
interface HasColor {
    public function color(): string;
}
/
enum TrafficLight: string implements HasColor {
    case Red = 'red';
    case Yellow = 'yellow';
    case Green = 'green';

    public function color(): string {
        return $this->value;
    }
}

// Kullanım:
$light = TrafficLight::Green;
echo $light->color(); // "green"



//TRAİT
//Trait, enum içinde ortak kodu tekrar kullanmak için kullanılabilir.
//LabelTrait sayesinde label metodu enum’un içine taşınmadan tekrar kullanılabilir.
trait LabelTrait {
    public function label(): string {
        return match($this) {
            self::Red    => 'Dur',
            self::Yellow => 'Hazır ol',
            self::Green  => 'Geç',
        };
    }
}

enum TrafficLight: string {
    use LabelTrait;

    case Red = 'red';
    case Yellow = 'yellow';
    case Green = 'green';
}

// Kullanım:
echo TrafficLight::Yellow->label();

//FIBERS 8.1
//PHP DEEŞ ZAMANALI ÇALIŞMAYA YARIYORMUŞ:
//BİR İŞLEMİ DURDURABİLİR. VE İŞLEM KALDIĞI YERDN DEVAM EDER

$fiber = new Fiber(function (): void {
    echo "Fiber başladı\n";
    Fiber::suspend("Duraklama noktası");
    echo "Fiber devam ediyor\n";
});

echo "Ana program başlıyor\n";

$value = $fiber->start(); // Fiber çalışıyor, duraklama noktasına geliyor
echo "Fiber durdu, değer: $value\n";

$fiber->resume(); // Fiber kaldığı yerden devam ediyor

echo "Ana program bitti\n";
//ÇIKTI:
//Ana program başlıyor
//Fiber başladı
//Fiber durdu, değer: Duraklama noktası
//Fiber devam ediyor
//Ana program bitti


//. First-Class Callable Nedir?
//greet(...) → “bu fonksiyona callable olarak referans ver” demek.
function greet(string $name): string {
    return "Merhaba, $name!";
}

// PHP 8.0 ve öncesi
$greetCallable = Closure::fromCallable('greet');
echo $greetCallable('Hasan');

// PHP 8.1+ First-Class Callable
$greetCallable = greet(...); // sadece üç nokta ile
echo $greetCallable('Hasan'); // Merhaba, Hasan!
