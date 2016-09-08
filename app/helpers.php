<?php

function age($date_of_birth){
    $change = date_format(date_create($date_of_birth), 'Y');
    $year_now = date('Y');
    return $usia = $year_now - $change;
}

if ( ! function_exists('tgl_indo'))
{
    function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }
}

if ( ! function_exists('bulan'))
{
    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

if ( ! function_exists('nama_hari'))
{
    function nama_hari($tanggal)
    {
        $ubah = gmdate($tanggal, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];

        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari;
    }
}

if ( ! function_exists('hitung_mundur'))
{
    function hitung_mundur($wkt)
    {
        $waktu=array(	365*24*60*60	=> "tahun",
            30*24*60*60		=> "bulan",
            7*24*60*60		=> "minggu",
            24*60*60		=> "hari",
            60*60			=> "jam",
            60				=> "menit",
            1				=> "detik");

        $hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
        $hasil = array();
        if($hitung<5)
        {
            $hasil = 'kurang dari 5 detik yang lalu';
        }
        else
        {
            $stop = 0;
            foreach($waktu as $periode => $satuan)
            {
                if($stop>=6 || ($stop>0 && $periode<60)) break;
                $bagi = floor($hitung/$periode);
                if($bagi > 0)
                {
                    $hasil[] = $bagi.' '.$satuan;
                    $hitung -= $bagi*$periode;
                    $stop++;
                }
                else if($stop>0) $stop++;
            }
            $hasil=implode(' ',$hasil).' yang lalu';
        }
        return $hasil;
    }
}

//format tanggal timestamp
if( ! function_exists('tgl_indo_timestamp')){

    function tgl_indo_timestamp($tgl)
    {
        $inttime=date('Y-m-d H:i:s',$tgl); //mengubah format menjadi tanggal biasa
        $tglBaru=explode(" ",$inttime); //memecah berdasarkan spaasi

        $tglBaru1=$tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd
        $tglBaru2=$tglBaru[1]; //mendapatkan fotmat hh:ii:ss
        $tglBarua=explode("-",$tglBaru1); //lalu memecah variabel berdasarkan -

        $tgl=$tglBarua[2];
        $bln=$tglBarua[1];
        $thn=$tglBarua[0];

        $bln=bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
        $ubahTanggal="$tgl $bln $thn"; //hasil akhir tanggal

        return $ubahTanggal;
    }
}

if( ! function_exists('tgl_indo_timestamp_waktu')){

    function tgl_indo_timestamp_waktu($tgl)
    {
        $inttime=date('Y-m-d H:i:s',$tgl); //mengubah format menjadi tanggal biasa
        $tglBaru=explode(" ",$inttime); //memecah berdasarkan spaasi

        $tglBaru1=$tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd
        $tglBaru2=$tglBaru[1]; //mendapatkan fotmat hh:ii:ss
        $tglBarua=explode("-",$tglBaru1); //lalu memecah variabel berdasarkan -

        $tgl=$tglBarua[2];
        $bln=$tglBarua[1];
        $thn=$tglBarua[0];

        $bln=bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
        $ubahTanggal="$tglBaru2"; //hasil akhir tanggal

        return $ubahTanggal;
    }
}

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        return Request::is($path) ? ' class="active"' : '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? ' class="active"' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return ' class="active"';
        }
        return '';
    }
}
