# Takvim-Projesi:

Bu proje kullanıcı kaydı ve girişi olan kullanıcı sisteme girdiği zaman takvimden istediği günü seçerek 
o gün ile ilgili planlarını , olaylarını ve hangi durumda olduklarını yazabilmektedir.
Sistemden çıkış yapıldığında tekrar giriş ekranına dönülür ve kullanıcı tekrar giriş yaptığında seçtiği 
olayları ve günleri görüp hatırlamaktadır,kullanıcı isterse güncelleyebilir ve silebilmektedir.
Kullanıcı sistemde ne kadar kaldığını söyleyen bir sayaç ile karşılaşmaktadır.Süre bitiminde ekranda alert
vermektedir (Takvim süreniz dolmuştur) yazısını görerek ister silme işlemi ister güncelleme işlemi yapmaktadır. 
Aksi taktirde yazıgitmeyecektir.

Kullanıcı sisteme kayıt olduğunda parolaları hashlanmiş şekilde mysq veritabanına kayıt olacakatır.
Her kullanıcının kendine ait id si bulunduğundan hiçbir kullanıcı ve olayları birbiri ile karışmayacak ve
başka biri direkt olarak takvim sistemine gitmeye çalıştığında engellenip login sayfasına atılacaktır.

Bu projede Olaylar ve Kullanıcılar olarak 2 tane mysq tablosu kullanılmıştır.
Bu proje PHP,javascrip,jqery,ajax kullanılarak yapılmıştır.

Bu projeyi çalıştırıp kullanabilmeniz için kaynak dosyalarını appserv,xampp vb. servis uygulamalarının gerekli klasörüne 
yerleştirerek kullanabilirsiniz.(mysql ve apache web serveri başlatıldığından emin olunuz. Tarayıcı kısmına /localhost) 
yazarak projeyi açabilirsiniz.

Linux için:
xampp kullanıyorsanız;

cd /opt/lampp/htdocs

git clone https://github.com/frtakkemik/Takvim-Projesi.git

sudo su root

chmod +x *

./manager-linux.64x
