<?php
//Code With Me:
//Başka bir geliştiriciyle aynı proje üzerinde gerçek zamanlı çalışmanı sağlar.

//Sen davet linki gönderirsin, diğer kişi tarayıcıdan veya PhpStorm’dan katılır.

//Katılan kişi senin editöründe kod yazabilir, dosya gezebilir, terminal kullanabilir, debug yapabilir (senin izin verdiğin ölçüde).

//Sen de karşı tarafın imlecini görebilirsin (Google Docs’taki gibi).

//Eş zamanlı sesli/görüntülü görüşme desteği de var (JetBrains üzerinden).

//******************************************************************************************************************

//Save Project As Template

/*Bir kez hazırladığın klasör yapısını, ayarları, bağımlılıkları veya başlangıç kodlarını kaydedip,
Sonraki projelerinde “New Project” ekranından doğrudan bu şablon üzerinden yeni bir proje oluşturabilirsin.
Ne işine yarar?
Her defasında aynı paketleri / kütüphaneleri kurmakla uğraşmazsın.
Standart dizin yapını (src, public, config vs.) hep hazır gelir.
Ekibin için bir “başlangıç noktası” oluşturabilirsin (örneğin Laravel + belirli konfigürasyonlar + kendi helper’ların).*/


//******************************************************************************************************************

//Manage Project As Template

/*PhpStorm’daki Manage Project Templates (bazı sürümlerde Manage Project As Template diye de geçebiliyor) özelliği, daha önce Save Project as Template ile oluşturduğun şablonları yönetmene yarar.

📌 Burada yapabileceklerin:

Kaydettiğin şablonların listesini görmek

İsimlerini değiştirmek

Artık kullanmak istemediklerini silmek

Yeni proje açarken görünecek seçenekleri düzenlemek*/

//******************************************************************************************************************

//DEPLOYMENT

/*PhpStorm’da Deployment sekmesi ya da menüsü, projeni uzak bir sunucuya (server) senkronize etmeni sağlar. 🚀

Ne işe yarar?

Lokal geliştirdiğin kodları, doğrudan FTP, SFTP, FTPS, FTPS over SSH, hatta lokal klasör üzerinden başka bir ortama gönderebilirsin.

PhpStorm, dosya yükleme (upload), indirme (download), otomatik senkronizasyon ve “on-the-fly edit” (dosyayı direkt sunucuda açıp düzenleme) özelliklerini destekler.

Ayrıca Remote Interpreter ile doğrudan uzak sunucuda PHP kodlarını çalıştırabilirsin.*/

//******************************************************************************************************************

//INVALİDATE CACHES

/*PhpStorm’daki Invalidate Caches / Restart… seçeneği, IDE’nin tuttuğu geçici dosyaları ve indexleri temizlemek için kullanılır.

💡 PhpStorm (ve genel olarak JetBrains IDE’leri), projedeki dosyaları hızlı aramak, autocompletion (tamamlama) ve kod analizi yapabilmek için büyük bir cache ve index tutar. Bazen bu cache bozulabilir veya güncel olmayabilir → işte o zaman bu komut devreye girer.

Ne yapar?

    Invalidate Caches → IDE’nin tuttuğu index, cache, sembol tablosu, arama veritabanı gibi şeyleri sıfırlar.

Restart → IDE’yi yeniden başlatır ve yeni baştan indexleme yapar.

Ne zaman kullanılır?

    Kod ekledin ama IDE görmüyor (ör. yeni class’ı bulamıyor).

Autocompletion (tamamlama) veya renklendirme çalışmıyor.

“Phantom” (olmayan) hatalar görünüyor.

Dosya/dizin silindi veya taşındı ama IDE hala eski halini gösteriyor.

Proje build/debug sırasında “garip” hatalar veriyor ama kod aslında doğru.

Kullanımı

Menüden: File → Invalidate Caches / Restart…

Çıkan pencerede:

Invalidate and Restart → cache’i temizler ve IDE’yi yeniden başlatır.

Invalidate Only → sadece temizler, sen elle kapatıp açarsın.

Just Restart → cache temizlemeden yeniden başlatır.*/


//******************************************************************************************************************

//MACROS

/*PhpStorm’daki Macros özelliği, IDE içinde yaptığın bir dizi işlemi kaydedip sonradan tek tuşla tekrar çalıştırmanı sağlar. 🔁

Yani küçük bir otomasyon aracı gibi düşünebilirsin.

📌 Ne işe yarar?

    Sık tekrarladığın editör işlemlerini kaydedip otomatikleştirebilirsin.

Örneğin:

Satır sonuna ; ekle, sonra alta in, sonra echo yaz → bunların hepsini bir makro olarak kaydedebilirsin.

Kod formatlama + belirli bir regex arama/replace işlemi.*/

//******************************************************************************************************************

//CODE ALTINDA
/*🔹 1. Generate (Alt+Insert / ⌘N)

Kod içinde otomatik şablon üretme aracıdır.

Örneğin bir sınıf (class) içindeyken:

Constructor

Getter / Setter

toString()

Equals & HashCode

PHPDoc

Test sınıfı

Bunları elle yazmak yerine PhpStorm senin için hazır kod bloğu oluşturur.

🔹 2. Code Completion (Ctrl+Space / ⌃Space)

PhpStorm’un en güçlü özelliklerinden biri → akıllı kod tamamlama.

İki türü vardır:

Basic Completion: değişken, metod, sınıf isimleri için öneriler.

Smart Completion: bağlama göre (context-aware) en uygun nesneleri önerir (örneğin $db-> yazınca sadece veritabanı metotları çıkar).

Ayrıca Live Templates ve snippet’ler de burada devreye girer.

🔹 3. Inspect Code

Projeni seçip statik analiz yaptırabilirsin.

PhpStorm tüm kodu tarar ve şu konularda rapor çıkarır:

Kullanılmayan değişkenler

Erişilemeyen kod (dead code)

Potansiyel bug’lar (ör. null olabilir, tip uyuşmazlığı)

Code style ihlalleri

Sonuçlar “Inspection Results” penceresinde listelenir.

🔹 4. Analyze Code

Daha derinlemesine inceleme araçları içerir.

Örnekler:

Inspect Code (detaylı proje analizi)

Run Inspection by Name → belirli bir kontrolü çalıştırma (ör. sadece unused variable).

Analyze Dependencies → hangi sınıf / paket hangisine bağımlı, grafiksel gösterim.

Code Coverage (test sonrası hangi kodlar çalışmış).*/


//******************************************************************************************************************


//TOOLS ALTINDA

/*1. Services

PhpStorm içindeki hizmetleri ve entegrasyonları tek panelde görmeyi sağlar.

Burada görebileceklerin:

Database bağlantıları (MySQL, PostgreSQL vs.)

Application servers (Docker, Tomcat, PHP built-in server, Remote interpreter vs.)

Background görevler (Deployment upload, Composer install, PHPUnit test, vb.)

Yani “IDE’nin arka planda kullandığı tüm servisleri tek yerden yönetme” ekranıdır.

🔹 2. Vagrant

PhpStorm, Vagrant ile entegrasyon sunar.

Vagrant → sanal makineyi (genelde VirtualBox üzerinde) kolayca ayağa kaldırmanı sağlayan bir araçtır.

IDE’den çıkmadan:

vagrant up, vagrant halt, vagrant reload gibi komutları çalıştırabilirsin.

Provisioning, SSH bağlantısı ve folder mapping ayarlarını yönetebilirsin.

Yani projen için ayrı bir VM geliştirme ortamı kullanıyorsan, PhpStorm bunu destekler.

🔹 3. HTTP Client

Bu özellik IDE içinde Postman gibi HTTP isteği atmanı sağlar.

Senaryo: GET, POST, PUT, DELETE gibi API isteklerini doğrudan PhpStorm’dan test edebilirsin.

.http veya .rest dosyaları oluşturup içine istekleri yazabilirsin:

GET https://api.example.com/users
Authorization: Bearer {{token}}

POSTMAN İŞLEMLERİ


Sonra sağ tık → Run diyerek isteği gönderirsin.

Gelen cevap JSON / XML ise güzelce formatlanmış şekilde görünür.*/

//******************************************************************************************************************
