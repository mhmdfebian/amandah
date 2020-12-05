<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifSertiEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;
    public $namadepan;
    public $namabelakang;
    public $tanggalkadaluarsa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        $this->namadepan = $this->details['namadepan'];
        $this->namabelakang = $this->details['namabelakang'];
        $this->namasertifikat = $this->details['namasertifikat'];
        $this->tanggalkadaluarsa = $this->details['tanggalkadaluarsa'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $nama = $this->details['namadepan'];
        // $subject = 'Selamat pagi' {$this->details['namadepan']};
        return $this->subject('Peringatan Ketidakaktifan Sertifikat Pekerja')
        ->view('emails.email')->with([
            'namadepan'=> $this->namadepan,
            'namabelakang'=>$this->namabelakang,
            'namasertifikat'=>$this->namasertifikat,
            'tanggalkadaluarsa'=>$this->tanggalkadaluarsa,
        ]);
    }
}
