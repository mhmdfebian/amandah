<div>
    Yth, {{ $namadepan }}  {{ $namabelakang }}.<br>
    Kami infomasikan kepada Anda melalui email ini bahwa Sertifikat Anda:<br><br>
    Nama Sertifikat: {{ $namasertifikat }}<br>
    @if ($tanggalkadaluarsa == date("Y-m-d"))
    Yang sudah berakhir hari ini {{ date('d F Y', strtotime($tanggalkadaluarsa))}}<br><br>
    @else
    Yang sudah berakhir pada: {{date('d F Y', strtotime($tanggalkadaluarsa))}}<br><br>
    @endif

    Mohon untuk segera mengurus masa aktif sertifikat Anda dan membalas email ini dengan mengirim Sertifikat yang baru serta menuliskan infomasi Tipe, Tanggal Aktif, dan Tanggal Berakhirnya Sertifikat Anda.<br><br>

    Salam,<br><br>

    Admin amandah.
</div>
