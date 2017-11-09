<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil;


class PengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $panjang = $request->get('panjang');
        $top = $request->get('top');
        $perPage = 25;

        if (!empty($panjang)) {
            $rekomendasi = Hasil::get();
            $urutrekom = collect($rekomendasi)->groupBy('reviewerid')->keys()->all();
            $urutreviewerid = collect($urutrekom)->sort()->values()->all();

            for ($i=0; $i < collect($urutreviewerid)->count(); $i++) { 
                $user[$i] = Hasil::where('reviewerid', $urutreviewerid[$i])->get();
            }

            for ($j=0; $j < collect($urutreviewerid)->count(); $j++) { 
                $usertop[$j] = $user[$j]->sortByDesc('hasil')->values()->all();
            }

            // $usertop = $user[0]->sortByDesc('hasil')->values()->all();

            for ($k=0; $k < collect($urutreviewerid)->count(); $k++) { 
                $top5[$k] = collect($usertop[$k])->splice(0, $top)->all();
            }


            // $top5 = collect($usertop)->splice(0, 5)->all();


            for ($l=0; $l < collect($urutreviewerid)->count(); $l++) { 
                $hit[$l] = collect($top5[$l])->where('rekomend', 'YES')->all();
                $hitcoverage[$l] = collect($top5[$l])->where('rekomend', 'NO')->all();
            }


            for ($o=0; $o < collect($urutreviewerid)->count(); $o++) { 
                $t[$o] = collect($usertop[$o])->where('rekomend', 'YES')->all();
            }

            // $hit = collect($top5)->where('rekomend', 'YES')->all();
            // $t = collect($usertop)->where('rekomend', 'YES')->all();

            for ($m=0; $m < collect($urutreviewerid)->count(); $m++) { 
                $jmlhit[$m] = collect($hit[$m])->count();
                $jmlhitcoverage[$m] = collect($hitcoverage[$m])->count();
            }


            for ($n=0; $n < collect($urutreviewerid)->count(); $n++) { 
                $jmlt[$n] = collect($t[$n])->count();
            }

            // $lenght = 5;

            $jmlusert = 0;

            for ($q=0; $q < collect($urutreviewerid)->count(); $q++) { 
                if ($jmlt[$q] == $panjang or $jmlt[$q] == $panjang+1) {
                    $jmlusertt[$q] = $jmlusert++; 
                }
            }

            // $jmlhit = collect($hit)->count();
            // $jmlt = collect($t)->count();


            for ($p=0; $p < collect($urutreviewerid)->count(); $p++) { 
                if ($jmlt[$p] == $panjang or $jmlt[$p] == $panjang+1) {
                    $hitsrate[$p] = $jmlhit[$p] / $jmlt[$p];
                    $hitsratecoverage[$p] = $jmlhitcoverage[$p] / ( collect($rekomendasi)->count() / collect($urutreviewerid)->count() );
                }
            }


            $hasilakhir = ( collect($hitsrate)->sum() / $jmlusert ) * 100;
            $hasilakhircoverage = ( collect($hitsratecoverage)->sum() / $jmlusert ) * 100;


            // $hitsrate = $jmlhit / $jmlt;


            
            

            // for ($i=0; $i < collect($rekomendasi)->count(); $i++) { 
            //     $user[]
            // }
            //   $user = User::where('akses','siswa')->get();
            //   $options = Dsiswa::whereNotIn('id',$user->pluck('user_id'))->get();
        } else {
            $hasilakhir = 0;
            $hasilakhircoverage = 0;
          // $jadwals = Jadwal::paginate($perPage);
        }

        $hasil = Hasil::get();
        // return $hasil;
        return view('testpenguji', compact('panjang', 'hasilakhir', 'hasilakhircoverage', 'top'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
