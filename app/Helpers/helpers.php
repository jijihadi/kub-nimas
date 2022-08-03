<?php
if (!function_exists('tglindo')) {
    /**
     * @return string
     */

    function tglindo($date)
    {
        $BulanIndo = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        // $result = '0';
        return ($result);
    }

}

if (!function_exists('bulanindo')) {
    /**
     * @return string
     */

    function bulanindo($date)
    {
        $BulanIndo = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");
        $bulan = $date;
        $result = $BulanIndo[(int) $bulan - 1];
        return ($result);
    }

}

if (!function_exists('get_uri')) {
    /**
     * @return string
     */

    function get_uri($par = null)
    {
        $route = url()->current();
        $route = str_replace('https://', '', $route);
        $route = str_replace('http://', '', $route);
        $arrayed = explode('/', $route);
        $uri = $arrayed[$par];
        return $uri;
    }
}

if (!function_exists('get_headname')) {
    /**
     * @return string
     */

    function get_headname($par = null)
    {
        $route = url()->current();
        $route = str_replace('https://', '', $route);
        $route = str_replace('http://', '', $route);
        $route = str_replace('-', ' ', $route);
        $arrayed = explode('/', $route);
        $uri = $arrayed[$par];
        return $uri;
    }
}

if (!function_exists('cek_active')) {
    /**
     * @return string
     */

    function cek_active($route)
    {
        $status = get_uri(1) == $route ? 'active' : '';
        return $status;
    }
}

if (!function_exists('rupiah')) {
    /**
     * @return string
     */

    function rupiah($angka)
    {
        $rupiah = number_format($angka, 0, ',', '.');
        return "Rp " . $rupiah;
    }
}

if (!function_exists('bilanganbulat')) {
    /**
     * @return string
     */

    function bilanganbulat($teks)
    {
        $teks = preg_replace("/[^0-9]/", "", $teks);
        return $teks;
    }
}

// Personal Helper
if (!function_exists('getsaldokas')) {
    /**
     * @return string
     */

    function getsaldokas($tanggal)
    {
        $query = DB::table('kas')->select(DB::raw('(SUM(masuk)) - (SUM(keluar)) as saldo'))
        ->where('tanggal','<=', $tanggal)
        ->groupBy(DB::raw("month(created_at)"))
        ->orderby('id')
        ->get()->toArray();

        return $query[0]->saldo;
    }
}

if (!function_exists('getkasmasuk')) {
    /**
     * @return string
     */

    function getkasmasuk()
    {
        $query = DB::table('kas')->select(DB::raw('(SUM(masuk)) as saldo'))
        // ->where('tanggal','<=', $tanggal)
        ->groupBy(DB::raw("month(created_at)"))
        ->orderby('id')
        ->get()->toArray();

        return $query[0]->saldo;
    }
}

if (!function_exists('getkaskeluar')) {
    /**
     * @return string
     */

    function getkaskeluar()
    {
        $query = DB::table('kas')->select(DB::raw('(SUM(keluar)) as saldo'))
        // ->where('tanggal','<=', $tanggal)
        ->groupBy(DB::raw("month(created_at)"))
        ->orderby('id')
        ->get()->toArray();

        return $query[0]->saldo;
    }
}
