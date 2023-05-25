-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Oct 13, 2021 at 08:51 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Teknoloji', 'Teknoloji ile ilgili haberler.'),
(2, 'Sağlık', 'Sağlık ile ilgili haberler.'),
(3, 'Ekonomi', 'Ekonomi ile ilgili haberler.'),
(4, 'Sanat', 'Sanat ile ilgili haberler.'),
(5, 'Dünya', 'Dünya ile ilgili haberler.'),
(6, 'Spor', 'Spor ile ilgili haberler.'),
(7, 'Magazin', 'Magazin ile ilgili haberler.'),
(8, 'Yaşam', 'Yaşam ile ilgili haberler.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `date`, `user_id`, `news_id`) VALUES
(1, 'Sabırsızlıkla bekliyoruz :)', '2021-10-13 20:34:50', NULL, 1),
(2, 'Hoşgeldin kraliçe', '2021-10-13 20:34:57', 1, 1),
(3, 'Bu sıralar hep sıkıntı çıkıyor.', '2021-10-13 20:35:42', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `editor_categories`
--

CREATE TABLE `editor_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `category_id`, `user_id`, `image`) VALUES
(1, 'Adele, yeni single&#39;ı &#34;Easy on Me&#34; ile dönüyor', 'Ünlü şarkıcı Adele, uzun zaman sonra yeni single’ı “Easy on Me” ile 15 Ekim’de piyasaya dönecek. &#13;&#10;&#13;&#10;The Guardian’da yer alan habere göre, 33 yaşındaki Adele, 15 Ekim’de piyasaya çıkacak yeni single’ı Easy on Me’yi 20 saniyelik siyah beyaz bir kliple duyurdu. Klipte, Adele eski bir teyp kasetini arabasının müzik setine yerleştiriyor ve arabasının penceresinden nota sayfaları uçuşmaya başlıyor.&#13;&#10;&#13;&#10;Adele’in yeni single’ından sonra bir albümü de piyasaya çıkacak.&#13;&#10;&#13;&#10;21 albümü Adele, Guinness Rekorlar Kitabı&#39;na çok sayıda rekor ile girmişti. İngiltere&#39;de bir yıl içinde üç milyondan fazla kopya satan ilk sanatçı olmuştu. Hello şarkısı, 2017 Grammy Ödülleri&#39;nde &#34;Yılın Kaydı&#34;, &#34;Yılın Şarkısı&#34; ve &#34;En İyi Pop Solo Performansı&#34; ödüllerini kazanırken; 25 albümü, &#34;En İyi Pop Vokal Albümü&#34; ödülünün yanında &#34;Yılın Albümü&#34; kategorisinde de Grammmy kazandı. Böylece Adele, 2012&#39;de 21 albümüyle kazandığı ödülün ardından bu seneki zaferiyle Grammy Ödülleri tarihinde iki defa &#34;Yılın Albümü&#34; ödülünü kazanan ikinci kadın sanatçı oldu.', '2021-10-13', 4, 1, 'adele-61673dd023c81.jpg'),
(2, 'Her gün aspirin kullanmak iç kanama riskini artırıyor', 'ABD&#39;de hastalıkları önleme konusunda gönüllü uzmanlardan oluşan bir heyet, 60 yaş üstü kişilerin her gün düşük dozda aspirin kullanmasının, iç kanama riskini artırdığı uyarısında bulundu.&#13;&#10;&#13;&#10;ABD Önleyici Hizmetler Görev Gücü adlı kurula göre bu nedenle 60 yaş üstü kişiler için kalp krizi ve inme riskini azaltma umuduyla her gün düşük dozda aspirin kullanmanın zararları, yararlarından daha fazla.&#13;&#10;&#13;&#10;Kurul ayrıca düşük dozda aspirin kullanımının, kalın bağırsak kanserinden ölüm ihtimalini azalttığı yolunda da yeterli kanıt olmadığını açıkladı.&#13;&#10;&#13;&#10;Aynı kurul 2016 yılında ise ilk kalp krizi ve inme vakalarını önlemede düşük doz aspirin kullanılmasının yararlı olduğu yönünde tavsiyede bulunmuştu.', '2021-10-13', 2, 1, 'aspirin-61673e919a622.jpg'),
(3, 'Dışarıdan yemek sipariş verenler dikkat!', 'ABD&#39;de yapılan yeni bir araştırma, tüketici ürünlerindeki sentetik kimyasalların saçtığı tehlikeyi ortaya koydu. Uzmanlar uyarıyor! Ölümcül derecede olabilecek &#34;ftalat&#34; (esnekliklerini artırmak için plastiklere eklenen bir madde) isimli bu kimyasallar, yemek paketlerinden, çocuk oyuncaklarına pek çok yerde var.&#13;&#10;&#13;&#10;Gıda saklama kapları, şampuan, makyaj, parfüm ve çocuk oyuncakları gibi yüzlerce tüketici ürününde bulunan ftalat adı verilen sentetik kimyasallar, 55-64 yaş arasındaki 100 bin ölümün nedeni olabilir. Bu iddia, ABD’de yapılan bir araştırmanın sonucunda ortaya çıktı.&#13;&#10;&#13;&#10;Environmental Pollution dergisinde yayımlanan yeni bir araştırmaya göre, yüksek ftalat seviyesine maruz kalan kişilerin erken ölüm riskinin, kardiyovasküler hastalıklara bağlı ölüm riskinden daha çok olduğu ortaya çıkarıldı.&#13;&#10;&#13;&#10;&#34;Vücudun hormon üretim mekanizmasına müdahale ediyor&#34;&#13;&#10;Araştırma, bu durumun ABD’ye ekonomik üretkenlik kaybı nedeniyle her yıl yaklaşık 40 ila 47 milyar dolara mal olabileceğini öne sürdü.&#13;&#10;&#13;&#10;Çevre tıbbı profesörü Dr. Leonardo Trasande, &#34;Bu çalışma, plastiğin insan vücudu üzerindeki etkisine ilişkin daha önceki araştırmalara katkıda bulunuyor ve plastik kullanımını azaltmak veya tamamen ortadan kaldırmak için uygulanması gereken adımları gösteriyor.&#34; dedi.&#13;&#10;&#13;&#10;New York’taki NYU Langone Health’de yapılan araştırmaya göre, ftalatların vücudun endokrin sistem olarak bilinen hormon üretim mekanizmasına müdahale ettiği belirlenirken, bunların &#34;gelişim, üreme, beyin, bağışıklık ve diğer problemlerle&#34; bağlantılı olduğu da ortaya çıkardı.&#13;&#10;&#13;&#10;Ulusal Çevre Sağlığı Bilimleri Enstitüsü de araştırmayla ilgili küçük hormonal bozulmaların bile &#34;önemli gelişimsel ve biyolojik etkilere&#34; neden olabileceğini belirtirken, ftalat kullanımına dikkat çekti.', '2021-10-13', 2, 1, '1634041083184-sip-61673ec7d519c.jpg'),
(4, 'Snapchat&#39;e erişim sorunu', 'Popüler paylaşım sitesi Snapchat’e erişim problemi yaşanıyor. Snapchat&#39;ten yapılan açıklamada &#34;Sorun yaşadığının farkındayız, araştırıyoruz&#34; denildi.&#13;&#10;&#13;&#10;Snapchat’e erişim sorunu yaşanıyor.&#13;&#10;&#13;&#10;Birçok kullanıcı popüler uygulamaya erişim sağlayamadıkları geri bildiriminde bulundu.&#13;&#10;&#13;&#10;Problemin saat 14.33 itibatıyla başladığı ve yaklaşık 3 saattir sürdüğü, Türkiye&#39;deki kullanıcıları da etkilediği belirtildi.&#13;&#10;&#13;&#10;Snapchat&#39;ten açıklama &#13;&#10;Snapchat&#39;ten yapılan açıklamada &#34;Bazı Snapchat kullanıcılarının şu anda uygulamayı kullanırken sorun yaşadığının farkındayız, araştırıyoruz&#34; denildi.', '2021-10-13', 1, 1, 'snap-61673ef25efb8.jpg'),
(5, 'iPhone 13 üretiminde çip krizi etkisi: Apple hisseleri düştü', 'Apple, eylül ayında yeni iPhone 13 modellerini tanıtmıştı.&#13;&#10;&#13;&#10;Küresel bilgisayar çipi yetersizliği nedeniyle iPhone 13 üretim hedeflerine ulaşamama riski yaşanırken Apple hisseleri de düşüş yaşadı.&#13;&#10;&#13;&#10;BBC&#39;de yer alan habere göre, elektronik evi Apple, 2021&#39;nin son çeyreğinde 90 milyon iPhone üretmeyi hedefliyordu. Öte yandan Apple&#39;ın ortaklarına bu hedefin yaklaşık 10 milyon daha düşük olabileceğini bildirdiği ortaya çıkmıştı.&#13;&#10;&#13;&#10;Haberin çıkmasıyla Apple&#39;ın hisseleri yüzde 1.2 oranında düştü.&#13;&#10;&#13;&#10;Yarı iletken üreticileri Broadcom ve Texas Instruments da Apple&#39;a çip yetiştirme sorunları yaşadıklarını açıkladıktan sonra hisselerinde yüzde 1&#39;lik düşüş yaşadı.&#13;&#10;&#13;&#10;Apple, eylül ayında yeni iPhone 13 modellerini tanıtmıştı.&#13;&#10;&#13;&#10;Çip sorunu&#13;&#10;Çok sayıda endüstride milyonlarca cihazın çalışması bilgisayar çiplerine bağlı ve yarı iletken üretici fabrikalar şu anda talebe yetişmeye çalışıyor. Dünya genelinde yaşanan çip sorunu, akıllı telefon üretcilerini, araba ve oyun konsolu endüstrilerini etkiledi.', '2021-10-13', 1, 1, 'apple-61673f1561c18.jpg'),
(6, 'Ünlü şarkıcı Emani 22, yaşamını yitirdi', 'ABD&#39;li şarkıcı Emani Johnson, 22 yaşında yaşamını yitirdi. Genç şarkıcının ölüm nedeni henüz açıklanmadı.&#13;&#10;&#13;&#10;Emani 22 olarak bilinen ünlü R&#38;B şarkıcısı Emani Johnson&#39;ın ölümü dün gece açıklandı.&#13;&#10;&#13;&#10;27 Aralık 1998 tarihinde Los Angeles&#39;ta doğan Emani, şarkıcılığının yanı sıra dansçılık da yapıyordu. Emani, 2020 yılında The Color Red albümünü yayınlamıştı.&#13;&#10;&#13;&#10;Rapçi Bhad Bhabie sosyal medyadan yaptığı paylaşımda &#34; Ne söyleyeceğimi bile bilmiyorum. Yaşananlar bana gerçek gibi gelmiyor. Neredeyse her günümü seninle birlikte geçirdim. Benim için anlamın büyüktü. Sen benim esin kaynağımdın, senin hep özleyeceğim&#34; yazdı.', '2021-10-13', 7, 1, 'emani-61673f3c7a6c6.jpg'),
(7, 'Demet Akalın, &#34;Gelinim Mutfakta&#34; programından ayrıldı', 'Kanal D&#39;de yayınlanan Gelinim Mutfakta&#39;nın sunucusu Demet Akalın, programdan ayrıldığını açıkladı. &#13;&#10;&#13;&#10;Kanal D’de hafta içi her gün yayınlanan Gelinim Mutfakta’nın ilk sunucusu Fatih Ürek, 2. Sayfa programına konuk oldu. Ürek, bir dönem çok yakın dostu olan Demet Akalın&#39;ın Gelinim Mutfakta’dan ayrılacağını açıkladı.&#13;&#10;&#13;&#10;Akalın programa bağlanarak &#34;O hiçbir şey bilmeden benim adıma neden konuşuyor?&#34; diyerek tepki gösterdi.&#13;&#10;&#13;&#10;&#34;10 gün önce ayrıldım&#34;&#13;&#10;Fatih Ürek, bu soruya yanıt vermezken Akalın ise o iddiayı doğruladı. Akalın Gelinim Mutfakta’dan ayrıldığını söyleyen Ürek&#39;i onayladı. Akalın açıklamasında &#34;Ben disiplinli kadınım. Ben 5 gün konser üstüne 3 gün 15 saat çalışamam. Ben 2 gün diye anlaştım. 10 gün önce ayrıldım. Beni bırakın Gülben&#39;i alın Songül Karlı&#39;yı alın dedim. Fatih bile geri alabilir&#34; dedi. Ürek ise &#34;Allah korusun&#34; dedi.', '2021-10-13', 7, 1, 'demet-61673f747385c.jpg'),
(8, 'Fransa&#39;da bir cami daha kapatılacak', 'Camide, 110 öğrencisi bulunan Kur&#39;an kursunun yer aldığı ifade edilirken, kursta &#34;silahlı cihadın&#34; öneminin anlatıldığı ileri sürüldü...&#13;&#10;&#13;&#10;Fransa&#39;nın Allonnes kentinde, bir caminin &#34;aşırı fikirler savunulduğu&#34; gerekçesiyle kapatılacağı belirtildi.&#13;&#10;&#13;&#10;Sarthe Valiliğinden yapılan yazılı açıklamada, 300 kişilik cemaate sahip camide &#34;radikal İslamcı harekete&#34; bağlı veya yakın kişilerin bulunduğu, vaazlarda terör eylemleri düzenlemenin, şiddetin, nefretin, ayrımcılığın, &#34;şehit&#34; olmanın ve &#34;şeriatın&#34; tesis edilmesinin teşvik edildiği iddia edildi.&#13;&#10;&#13;&#10;Camide, 110 öğrencisi bulunan Kur&#39;an kursunun yer aldığı ifade edilen açıklamada, kursta &#34;silahlı cihadın&#34; öneminin anlatıldığı ileri sürüldü.&#13;&#10;&#13;&#10;Açıklamada, bunun üzerine İçişleri Bakanı Gerald Darmanin&#39;in talebiyle bu caminin kapatılması için gerekli prosedürlerin başlatıldığı aktarıldı.&#13;&#10;&#13;&#10;Le Figaro gazetesinin konuyla ilgili haberinde, bu camiyle bağlantılı 8 kişinin de banka hesaplarına el konulacağı kaydedildi.', '2021-10-13', 5, 1, 'cami-61673fb6aa043.jpg'),
(9, 'İklim krizi: yüzlerce kişinin ölebileceği uyarısında bulundu', 'David Shukman - BBC Bilim Editörü&#13;&#10;&#13;&#10;İngiltere Çevre Ajansı, ülke genelinde seller nedeniyle yüzlerce kişinin hayatını kaybedebileceği uyarısında bulundu.&#13;&#10;&#13;&#10;Ajansın hazırladığı rapora göre İngiltere iklim değişikliğinin etkilerine hazır değil.&#13;&#10;&#13;&#10;Bu yıl Almanya&#39;da sellerde onlarca kişi hayatını kaybetmişti.&#13;&#10;&#13;&#10;Ajans, İngiltere&#39;de iklim değişikliğinin etkilerine hazırlık yapılmaması durumunda bu tür sellerin &#34;er ya da geç yaşanacağını&#34; açıkladı.&#13;&#10;&#13;&#10;&#39;Ya adapte olacağız, ya öleceğiz&#39;&#13;&#10;İngiltere Çevre Ajansı Başkanı Emma Howard Boyd, &#34;Ya koşullara adapte olacağız, ya da öleceğiz&#34; dedi.&#13;&#10;&#13;&#10;Yayımlanmadan önce BBC&#39;nin incelediği rapordaki kıyametvari ifadelerin, hükümetleri ve şirketleri sel, kuraklık ve deniz seviyelerindeki artış gibi tehditlere karşı harekete geçirmesi umuluyor.&#13;&#10;&#13;&#10;İngiltere Çevre, Gıda ve Köy İşleri Bakanlığı ülkeyi küresel ısınmanın etkilerinden korumak için mühim önlemler aldıklarını aktardı.&#13;&#10;&#13;&#10;Mevcut koşullar İngiltere&#39;nin 2100 yılında 3 derece daha sıcak olabileceğini gösteriyor.&#13;&#10;&#13;&#10;Fakat 2 derecelik artışın bile yıkıcı etkileri olabilir.&#13;&#10;&#13;&#10;Ajansa göre 2050 yılında beklenen değişimler şöyle:', '2021-10-13', 5, 1, 'iklim-61673fedb2a50.jpg'),
(10, 'Cristiano Ronaldo rekora doymuyor!', '2022 FIFA Dünya Kupası Avrupa Elemeleri&#39;nde ekim ayı mücadelesi A, B, C, D, F ve I gruplarında yapılan maçlarla tamamlandı. Portekizli yıldız Cristiano Ronaldo 10. kez 3 gol birden attı.&#13;&#10;&#13;&#10;Cristiano Ronaldo&#39;nun &#34;hat-trick&#34; yaptığı karşılaşmada Portekiz, sahasında Lüksemburg&#39;u 5-0 mağlup etti. Ev sahibi ekibin diğer gollerini Bruno Fernandes ve Palhinha kaydetti.&#13;&#10;&#13;&#10;36 yaşındaki Ronaldo, milli takım kariyerinde 10. kez sahadan &#34;hat-trick&#34; yaparak ayrıldı.&#13;&#10;&#13;&#10;Dünya Kupası Elemeleri&#39;nde 36 gole ulaşan Ronaldo&#39;nun kariyerindeki toplam &#34;hat-trick&#34; sayısı 58 oldu.&#13;&#10;&#13;&#10;Cristiano Ronaldo, Portekiz milli formasıyla 115 gole ulaştı. Avrupa&#39;da en çok milli takım forması giyen oyuncular arasında 182 maçla Ronaldo zirvede yer alıyor.', '2021-10-13', 6, 1, 'cristiano-616740232a496.jpg'),
(11, 'Fenerbahçe&#39;den tarihi kâr', 'Dört büyükler finansal sonuçlarını açıkladı. Fenerbahçe, kripto para geliriyle tarihinin en yüksek çeyreklik kârını elde etti. Galatasaray kâr, Beşiktaş ve Trabzonspor ise zarar açıkladı.&#13;&#10;&#13;&#10;Dört büyük kulüp, haziran-ağustos dönemi bilançolarını açıkladı. Fenerbahçe kripto paradan gelen gelir sayesinde 255,5 milyon TL&#39;lik rekor kâr açıkladı. Galatasaray da bu dönemde kâr açıklarken, Beşiktaş ve Trabzonspor zarar etti.&#13;&#10;&#13;&#10;Hisseleri Borsa İstanbul&#39;da işlem gören dört büyük kulüp, 2021 yılı üçüncü çeyrek bilançolarını açıkladı.&#13;&#10;&#13;&#10;Bir önceki çeyrekte 201,8 milyon TL&#39;lik net zarar açıklayan Fenerbahçe, üçüncü çeyrekte 255,5 milyon TL&#39;lik rekor net kâr elde etti.&#13;&#10;&#13;&#10;Fenerbahçe, kripto para alım satım platformu Paribu ile yapılan ortaklık kapsamında düzenlenen ‘Fenerbahçe token&#39; ön satışından ağustosta 268,5 milyon TL gelir elde ettiğini açıklamıştı. Üçüncü çeyrekteki kâr rakamı da bu sayede ortaya çıktı.&#13;&#10;&#13;&#10;Kulübün bir önceki dönemde 120 milyon TL olan dönem geliri, Fenerbahçe Token sayesinde 471 milyon TL&#39;ye yükseldi.', '2021-10-13', 6, 1, 'fenerbahce-616740491bfa7.jpg'),
(12, 'Neymar: 2022 benim oynayacağım son Dünya Kupası olacak', 'Dünyaca ünlü yıldız Neymar, 2022 Dünya Kupası&#39;nın kendisinin katılacağı son Dünya Kupası olduğunu dile getirdi.&#13;&#10;&#13;&#10;PSG&#39;nin yıldız futbolcusu Neymar, 2022 yılında Katar&#39;da düzenlenecek Dünya Kupası&#39;nın kendisinin son fırsatı olduğuna inanıyor. Brezilyalı yıldız 2022 yılındaki turnuvadan sonra başka bir Dünya Kupası&#39;nda oynamayı beklemediğini, oyunun gerginliğinin vücuduna ve zihnine zarar verdiğini açıkladı.&#13;&#10;&#13;&#10;DAZN&#39;ye konuşan Neymar, &#34;Sanırım bu benim oynayacağım son Dünya Kupası, bu turnuvayı bir son olarak görüyorum çünkü artık futbolla uğraşacak kadar mental gücüm var mı bilmiyorum. Bu yüzden ülkemle birlikte kazanmak, küçüklüğümden beri en büyük hayalimi gerçekleştirmek için her şeyi yapacağım&#34; ifadelerinde bulundu.', '2021-10-13', 6, 1, 'neymar-6167407d0ccc3.jpg'),
(13, 'İtalya&#39;da &#39;eşit işe eşit ücret&#39; yasa tasarısı Temsilciler Meclisi&#39;nden geçti', 'İtalya&#39;da iş dünyasında kadınlara erkeklerden daha az maaş ödenmesine karşı hazırlanan yasa tasarısı parlamentonun alt kanadı Temsilciler Meclisi&#39;nde kabul edildi.&#13;&#10;Eşit ücret yasası olarak anılan yasal düzenleme, kadınların işgücüne katılımını ve şirketlerin kadınlarla erkeklere eşit maaş uygulamasını teşvik etmek amacıyla hazırlandı.&#13;&#10;&#13;&#10;Merkez-soldaki Demokratik Parti&#39;den milletvekili Chiara Gribaudo&#39;nun öncülüğünde hazırlanan yasa tasarısı bugün Temsilciler Meclisi&#39;nde oybirliğiyle kabul edildi.&#13;&#10;&#13;&#10;Tasarının yasalaşması için parlamentonun diğer kanadı Senato&#39;dan da geçmesi gerekiyor.&#13;&#10;&#13;&#10;Tasarı yasalaşırsa işverenler, eşit işe eşit ücret politikası uygulayarak ve yükselme fırsatı açısından cinsiyetler arasındaki farkı azaltarak &#34;cinsiyet eşitliği sertifikası&#34; almaya hak kazanacak.&#13;&#10;&#13;&#10;Bu sertifikayı alan şirketlere sosyal güvenlik katkı payı indirimi gibi mali avantajlar sağlanacak.&#13;&#10;&#13;&#10;50&#39;den fazla çalışanı olan şirketler düzenli olarak personel raporu hazırlamak zorunda olacak. Bu raporların eksik ya da hatalı olduğu belirlenirse şirketlere para cezası verilebilecek.&#13;&#10;&#13;&#10;Çalışan sayısı 50&#39;nin altında olan şirketler ise bu raporu gönüllü olarak hazırlayarak teşviklerden faydalanabilecek.&#13;&#10;&#13;&#10;Yasa tasarısını hazırlayan Demokratik Partili milletvekili Chiara Gribaudo, tasarının Temsilciler Meclisi&#39;nde kabul edilmesinin ardından sosyal medyada bir kutlama mesajı paylaştı ve &#34;Temsilciler Meclisi, eşit ücret yasa tasarısını oybirliğiyle onayladı! Bunu, parlamento içinde ve dışında mücadele eden tüm kadınlara adıyoruz&#34; dedi. Gribaudo mesajını, &#34;Eşit iş, eşit ücret, eşitiz&#34; diye bitirdi.', '2021-10-13', 3, 1, 'italya-6167415d223ef.jpg'),
(14, 'Hazine ve Maliye Bakanlığından &#34;döviz bürolarında kimlik tespiti&#34; açıklaması', 'Hazine ve Maliye Bakanlığı, basında döviz bürolarına yönelik tebliğe ilişkin gerçeği yansıtmayan bazı iddialara yer verildiğini belirterek, &#34;Söz konusu yeni uygulamanın sektördeki kayıt dışılığın azaltılması ve kurumsallaşma düzeyinin artırılması ile uluslararası düzenlemelere uyum dışında başka hiçbir amacı yoktur. Tebliğ ile yapılan değişiklik, döviz piyasalarına ilişkin herhangi bir müdahaleyi kesinlikle içermemektedir.&#34; ifadelerini kullandı.&#13;&#10;&#13;&#10;Bakanlıktan yapılan açıklamada, bugün bazı basın yayın organlarında ve sosyal medya mecralarında döviz bürolarına yönelik Yetkili Müesseseler Tebliği&#39;ne ilişkin gerçeği yansıtmayan, gerçekle uzaktan yakından ilgisi olmayan bazı iddialara yer verildiği belirtildi.&#13;&#10;&#13;&#10;12 Ekim 2021 tarihli tebliğ değişikliğine kadar kambiyo mevzuatı kapsamında döviz alım satımında bir kimlik bildirim yükümlülüğü bulunmadığı anımsatılan açıklamada, &#34;Daha önce MASAK mevzuatı kapsamında işlem tutarı ya da birbiriyle bağlantılı birden fazla işlemin toplam tutarı 75 bin lirayı aşan işlemler ile vergi mevzuatı uyarınca 3 bin doları veya eşitini aşan işlemlerde kimlik tespiti zorunluluğu bulunmaktaydı.&#34; bilgisi verildi.', '2021-10-13', 3, 1, 'doviz-6167417f0f50b.jpg'),
(15, 'Adele: Londra&#39;dan asla ev alamam, çok pahalı', 'Altı yıl aradan sonra albüm çıkarmaya hazırlanan Adele, çok pahalı olduğu için Londra&#39;dan ev alamadığını, onun yerine Los Angeles&#39;a taşındığını açıkladı. En çok kazanan kadın şarkıcıların arasında gösteriyen Adele&#39;in sözleri sosyal medyada gündem oldu.', '2021-10-13', 8, 1, 'adl-616741d5d0823.jpg'),
(16, 'ABD&#39;nin Texas eyaletinde tüm Covid aşısı zorunlulukları yasaklandı', 'ABD’nin Texas eyaletinde Vali Greg Abbott, bütün Covid aşısı zorunlulukların kaldıran bir kararnameye imza attı. Texas’ta hiçbir kurum, özel şirket çalışanlarından ya da müşterilerinden Covid-19 aşısı yaptırmalarını bekleyemeyecek. &#13;&#10;&#13;&#10;Texas Tribune’de yer alan habere göre, kararı duyuran Vali Greg Abbott “Covid-19 aşısı güvenli, etkili ve virüse karşı en güçlü savunmamız ancak her zaman gönüllülük esasına dayanmalı ve asla zora olmamalı” yazan bir tweet attı. &#13;&#10;&#13;&#10;Abbott, daha önce özel işletmelerin çalışanları için Covid aşısını zorunlu tutmasının önünü açmıştı. &#13;&#10;&#13;&#10;Eyalette hükûmet kurumlarında aşı zorunluluğu başka bir kararnameyle engellenmiş, bu karara karşı dava açılmıştı. Eyaletin yasama organı, işletmelerin müşterilerden aşı belgesi talep etmesini de yasaklamıştı.&#13;&#10;&#13;&#10;ABD genelinde ise Joe Biden yönetimi, 100’den fazla çalışanı olan tüm işletmelerin aşıyı zorunlu tutması ya da haftalık PCR testi vermesini istemişti. Biden yönetimi aynı zamanda federal çalışanlar için de aşıyı zorunlu tutmuştu.', '2021-10-13', 5, 1, 'as-61674223283ae.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `role_level`) VALUES
(1, 'Kadir', 'Erman', 'kadirermantr@gmail.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 4),
(2, 'Admin', 'Lastname', 'admin@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 4),
(3, 'Moderator', 'Lastname', 'moderator@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 3),
(4, 'Editor', 'Lastname', 'editor@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 2),
(5, 'User', 'Lastname', 'user@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_followed_categories`
--

CREATE TABLE `user_followed_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_followed_categories`
--

INSERT INTO `user_followed_categories` (`id`, `user_id`, `category_id`) VALUES
(1, 1, 4),
(2, 1, 1),
(4, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_readed_news`
--

CREATE TABLE `user_readed_news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_readed_news`
--

INSERT INTO `user_readed_news` (`id`, `user_id`, `news_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 13),
(4, 1, 15),
(5, 1, 16),
(6, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_followed_categories`
--
ALTER TABLE `user_followed_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_readed_news`
--
ALTER TABLE `user_readed_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `editor_categories`
--
ALTER TABLE `editor_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_followed_categories`
--
ALTER TABLE `user_followed_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_readed_news`
--
ALTER TABLE `user_readed_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD CONSTRAINT `editor_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `editor_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `request_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_followed_categories`
--
ALTER TABLE `user_followed_categories`
  ADD CONSTRAINT `follow_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follow_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_readed_news`
--
ALTER TABLE `user_readed_news`
  ADD CONSTRAINT `read_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `read_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
