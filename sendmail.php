<?php
if (!isset($_POST["submit"])) {
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Phone: <input type="tel" name="phone"><br>
    Message: <textarea rows="10" cols="20" name="message"></textarea><br>
    <input type="submit" name="submit" value="Send Email">
</form>

<?php
} else {
    $to_email = "reciver mail";
    $from_email = "from premade mail";
    $subject = "mail subject.";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

    $headers = "From: $from_email\r\n";
    $headers .= "Reply-To: $from_email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    if (mail($to_email, $subject, $body, $headers)) {
        header("Location: positiv_mail.html");
        exit();
        
    } else {
        header("Location: negativ_mail.html");
        exit();
    }
}
?>
