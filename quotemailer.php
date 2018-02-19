<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    //Load composer's autoloader
    require 'vendor/autoload.php';
    $name = $_POST["name"];
    $email = $_POST['email'];
    $address = $_POST["address"];
    $phone_number = $_POST['phone_number'];
    $company_name = $_POST['company_name'];
    $project = $_POST["project"];
    $budget = $_POST['estimated_budget'];
    $domain_requirement = $_POST["domain_required"];
    $hosting_requirement = $_POST["hosting_required"];
    $messages = $_POST["messages"];
    $body = "Quotation from : '.$email.'<br>Name : '.$name.'<br>Address : '.$address.'<br>Phone Number : '.$phone_number.'<br>Company Name : '.$company_name.'<br>Project : '.$project.'<br>Budget Estimation : '.$budget.'<br>Domain Rquirement : '.$domain_requirement.'<br>Hosting Requirement : '$hosting_requirement'<br>Messages : ".$messages;
    // echo $name;
    // echo $email;
    // echo $subject;
    // echo $body;
    // die();
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'nevolutiontech2018@gmail.com';                 // SMTP username
        $mail->Password = 'nevo2018@tech!';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('nevolutiontech2018@gmail.com');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($email, $name);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Quotation from".$name;
        $mail->Body    = $body;
        // $mail->AltBody = strip_tags($body);
        $mail->send();
        echo "Message has been sent";
    } catch (Exception $e) {
        echo "Message could not be sent.";
    }
    
?>