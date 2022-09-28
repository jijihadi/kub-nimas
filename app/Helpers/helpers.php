<?php
if (!function_exists('tglindo')) {
    /**
     * @return string
     */

    function tglindo($date)
    {
        $BulanIndo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $result = $tgl . ' ' . $BulanIndo[(int) $bulan - 1] . ' ' . $tahun;
        // $result = '0';
        return $result;
    }
}

if (!function_exists('bulanindo')) {
    /**
     * @return string
     */

    function bulanindo($date)
    {
        $BulanIndo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $bulan = $date;
        $result = $BulanIndo[(int) $bulan - 1];
        return $result;
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

if (!function_exists('cek_admin')) {
    /**
     * @return string
     */

    function cek_admin()
    {
        $status = auth()->user()->role == 1 ? true : false;
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
        return 'Rp ' . $rupiah;
    }
}

if (!function_exists('bilanganbulat')) {
    /**
     * @return string
     */

    function bilanganbulat($teks)
    {
        $teks = preg_replace('/[^0-9]/', '', $teks);
        return $teks;
    }
}

if (!function_exists('maketitle')) {
    /**
     * @return string
     */

    function maketitle($teks)
    {
        $teks = ucwords(strtolower($teks));
        return $teks;
    }
}
if (!function_exists('makeclass')) {
    /**
     * @return string
     */

    function makeclass($teks)
    {
        $teks = strtolower(str_replace(' ', '_', $teks));
        return $teks;
    }
}

// Personal Helper
if (!function_exists('getfieldbyid')) {
    /**
     * @return string
     */

    function getfieldbyid($table, $field, $id)
    {
        $query = DB::table($table)
            ->where('id', $id)
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->$field;
    }
}
// Personal Helper
if (!function_exists('gettable')) {
    /**
     * @return string
     */

    function gettable($table, $where, $id)
    {
        $query = DB::table($table)
            ->where($where, $id)
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query;
    }
}
if (!function_exists('gettablesurat')) {
    /**
     * @return string
     */

    function gettablesurat($table, $where, $id, $stat)
    {
        $query = DB::table($table)
            ->where($where, $id)
            ->where('tanggal_masuk', 'not like', '0000-00-00')
            ->get()
            ->toArray();

        if ($stat == 'Keluar') {
            $query = DB::table($table)
                ->where($where, $id)
                ->where('tanggal_keluar', 'not like', '0000-00-00')
                ->get()
                ->toArray();
        }

        if (empty($query)) {
            return 0;
        }

        return $query;
    }
}
if (!function_exists('gettablefield')) {
    /**
     * @return string
     */

    function gettablefield($table, $where, $id, $field)
    {
        $query = DB::table($table)
            ->where($where, $id)
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->$field;
    }
}
if (!function_exists('getidkub')) {
    /**
     * @return string
     */

    function getidkub($id)
    {
        $query = DB::table('kubs')
            ->where('id_ketua', $id)
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->id;
    }
}
// Kas Shit
if (!function_exists('getsaldokas')) {
    /**
     * @return string
     */

    function getsaldokas($tanggal)
    {
        $query = DB::table('kas')
            ->select(DB::raw('(SUM(masuk)) - (SUM(keluar)) as saldo'))
            ->where('tanggal', '<=', $tanggal)
            ->groupBy(DB::raw('month(created_at)'))
            ->orderby('id')
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->saldo;
    }
}
if (!function_exists('getsaldokasid')) {
    /**
     * @return string
     */

    function getsaldokasid($tanggal, $id)
    {
        $query = DB::table('kas')
            ->select(DB::raw('(SUM(masuk)) - (SUM(keluar)) as saldo'))
            ->where('tanggal', '<=', $tanggal)
            ->where('id_kub', $id)
            ->groupBy(DB::raw('month(created_at)'))
            ->orderby('id')
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->saldo;
    }
}

if (!function_exists('getkasmasuk')) {
    /**
     * @return string
     */

    function getkasmasuk()
    {
        $query = DB::table('kas')
            ->select(DB::raw('(SUM(masuk)) as saldo'))
        // ->where('tanggal','<=', $tanggal)
            ->groupBy(DB::raw('month(created_at)'))
            ->orderby('id')
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->saldo;
    }
}

if (!function_exists('getkasmasukid')) {
    /**
     * @return string
     */

    function getkasmasukid($id)
    {
        $query = DB::table('kas')
            ->select(DB::raw('(SUM(masuk)) as saldo'))
        // ->where('tanggal','<=', $tanggal)
            ->where('id_kub', $id)
            ->groupBy(DB::raw('month(created_at)'))
            ->orderby('id')
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->saldo;
    }
}

if (!function_exists('getkaskeluar')) {
    /**
     * @return string
     */

    function getkaskeluar()
    {
        $query = DB::table('kas')
            ->select(DB::raw('(SUM(keluar)) as saldo'))
        // ->where('tanggal','<=', $tanggal)
            ->groupBy(DB::raw('month(created_at)'))
            ->orderby('id')
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->saldo;
    }
}

if (!function_exists('getkaskeluarid')) {
    /**
     * @return string
     */

    function getkaskeluarid($id)
    {
        $query = DB::table('kas')
            ->select(DB::raw('(SUM(keluar)) as saldo'))
        // ->where('tanggal','<=', $tanggal)
            ->where('id_kub', $id)
            ->groupBy(DB::raw('month(created_at)'))
            ->orderby('id')
            ->get()
            ->toArray();

        if (empty($query)) {
            return 0;
        }

        return $query[0]->saldo;
    }
}
