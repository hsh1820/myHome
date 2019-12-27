<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./php_mailer/src/PHPMailer.php";
require "./php_mailer/src/SMTP.php";
require "./php_mailer/src/Exception.php";

$mail = new PHPMailer(true);

try {

    // 서버세팅    
    $mail -> SMTPDebug = 0;    // 디버깅 설정
    $mail -> isSMTP();               // SMTP 사용 설정

    $mail -> Host = "smtp.naver.com";                      // email 보낼때 사용할 서버를 지정
    $mail -> SMTPAuth = true;                                // SMTP 인증을 사용함
    $mail -> Username = "shhan6485@naver.com";  // 메일 계정
    $mail -> Password = "dudghk12@";                   // 메일 비밀번호
    $mail -> SMTPSecure = "ssl";                             // SSL을 사용함
    $mail -> Port = 465;                                        // email 보낼때 사용할 포트를 지정
    $mail -> CharSet = "utf-8";                                // 문자셋 인코딩

    // 보내는 메일
    $mail -> setFrom("shhan6485@naver.com", "transmit");

    // 받는 메일
    $mail -> addAddress("shhan6485@naver.com", "receive01");
    $mail -> addAddress("shhan6485@gmail.com", "receive02");
    
    // // 첨부파일
    // $mail -> addAttachment("./test.zip");
    // $mail -> addAttachment("./anjihyn.jpg");

    // 메일 내용
    $mail -> isHTML(true);                                                         // HTML 태그 사용 여부
    $mail -> Subject = "PHPMailer 발송 테스트 입니다.";                  // 메일 제목
    $mail -> Body = "PHPMailer 발송에 <b>성공</b>하였습니다.";    // 메일 내용
    
    // 메일 전송
    $mail -> send();
    
    echo "Message has been sent";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error : ", $mail -> ErrorInfo;
}
?>