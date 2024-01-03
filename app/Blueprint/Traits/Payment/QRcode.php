<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/11/2018
 * Time: 12:00 AM
 */

namespace App\Blueprint\Traits\Payment;

use \Endroid\QrCode\QrCode as QR;

/**
 * Trait hasQrcode
 * @package App\Blueprint\Traits\Payment
 */
trait QRcode
{
    /**
     * @param $value
     * @param array $options
     * @return mixed
     * @throws \Endroid\QrCode\Exception\InvalidWriterException
     */
    function generateQrCode($value, $options = [])
    {
        $options = collect([
            'size' => 300,
            'margin' => 0
        ])->merge($options);
        $qrCode = new QR($value);
        $qrCode->setWriterByName('svg')
            ->setSize($options->get('size'))
            ->setMargin($options->get('margin'));

        return $qrCode->writeString();
    }
}