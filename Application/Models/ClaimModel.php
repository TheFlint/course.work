<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 13.11.2018
 * Time: 18:42
 */

namespace Flint\Application\Models;


use  Flint\Application\Functional\PHPMailer;

class ClaimModel
{
    public $fio;
    public $registration;
    public $number;
    public $email;
    public $numbers;
    public $created;
    public $data;
    public $lat;
    public $lng;
    public $file2;

    function create()
    {
        $index = 0;
        $file = "ghop.txt";
        $destination = 'uploads/'.$this->numbers.'/';

        cycle:
        if (file_exists($destination)){
            $destination = 'uploads/'.$this->numbers."(".$index.")/";
            $index++;
            goto cycle;
        } else {
            mkdir($destination);
        }

        file_put_contents($file,
            "
                      ПIБ вiдправника " . $this->fio . '
                      Номер телефону ' . $this->number . '
                      e-mail ' . $this->email . '
                      Номер машини ' . $this->numbers . '
                      Широта ' . $this->lat . '
                      Доавгота ' . $this->lng . '
                      Час створення ' . $this->created
        );
        $mail = new PHPMailer;
        $mail->setFrom('a7leno@gmail.com', 'First Last');
        $mail->addAddress('a7leno@gmaio.com', 'John Doe');
        $mail->Subject = 'PHPMailer file sender';
        $mail->msgHTML(
            "
                      ПIБ вiдправника " . $this->fio . '
                      Номер телефону ' . $this->number . '
                      e-mail ' . $this->email . '
                      Номер машини ' . $this->numbers . '
                      Широта ' . $this->lat . '
                      Доавгота ' . $this->lng . '
                      Час створення ' . $this->created);
        // Attach uploaded files
        for ($i = 0; $i < count($this->data['name']); $i++) {

            $tmp = move_uploaded_file($this->data['tmp_name'][$i],  $destination.$this->data['name'][$i]);

            var_dump($tmp);

            $mail->addAttachment($destination.$this->data['name'][$i]);
        }
        $r = $mail->send();
        var_dump($r);

        return true;
    }
}
