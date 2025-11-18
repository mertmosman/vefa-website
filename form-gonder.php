<?php
// Güvenlik: Post ile gönderilmiş mi kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verileri al
    $isim = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $telefon = htmlspecialchars(trim($_POST["phone"]));
    $mesaj = htmlspecialchars(trim($_POST["message"]));

    // E-posta gönderme (PHPMailer kullanılabilir, bu basit versiyondur)
    $to = "info@danismanlikmerkezi.com";  // Sitenin e-posta adresi
    $subject = "Yeni İletişim Mesajı";
    $body = "Ad Soyad: $isim\nE-posta: $email\nTelefon: $telefon\n\nMesaj:\n$mesaj";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mesajınız başarıyla gönderildi. Teşekkür ederiz.";
    } else {
        echo "Mesaj gönderilirken bir hata oluştu. Lütfen tekrar deneyin.";
    }
} else {
    // Form POST ile gönderilmediyse erişimi engelle
    header("Location: iletisim.html");
    exit();
}
?>
