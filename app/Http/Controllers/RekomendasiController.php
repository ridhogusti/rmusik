<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadata;
use App\Review;
use App\Hasilrekomendasi;
use App\User;
use Auth;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function loadData()
    {
        $posts = Review::orderBy('created_at','DESC')->limit(2)->get();
        $rekomendasi = Review::where('user_id',Auth::user()->id)
            ->join('metadata', 'review.amazon_id', 'metadata.amazon_id')->get();
        $preferencebaru = Metadata::orderBy('id','DESC')->limit(2)->get();
        // return $preferencebaru;
        $preferencepopuler = Metadata::paginate(4);
        return view('index', compact('posts','preferencebaru', 'preferencepopuler', 'rekomendasi'));        
        // return view('loaddata', compact('posts'));
    }

    public function loadDataAjaxpop(Request $request)
    {
        $output = '';
        $id = $request->id;
        
        // $posts = Review::where('id','<',$id)->orderBy('created_at','DESC')->limit(2)->get();
        $preferencepopuler = Metadata::where('id','<',$id)->orderBy('id','DESC')->limit(2)->get();
        if(!$preferencepopuler->isEmpty())
        {
            foreach($preferencepopuler as $item)
            {
                $url = url('blog/'.$item->id);
                $body = substr(strip_tags($item->title),0,500);
                $body .= strlen(strip_tags($item->title))>500?"...":"";
                                
                $output .= '
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10 ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding">
                                <img src="'.$item->imUrl.'" alt="" class="img-cover">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 f-raleway f-13 no-padding color-white hide-bg-gray hide-bor-bot">
                    
                                <p><strong>'.$item->title.'</strong></p>
                                <p>'.$item->artist.'</p>
                                <p>'.$item->root_genre.'</p>
                                <p>'.$item->first_release_year.'</p>
                                <p>3.5</p>
                            </div>
                        </div>
                            ';
            }
            
            $output .= '
                      <div id="remove-rowpop">
                        <div class="rows">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding color-white mar-top-10 text-center f-15">
                                    Tampilkan Lebih Banyak<br>
                                    <span data-id="'.$item->id.'" id="btn-morepop"  class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                        </div>
                    </div>
          ';
            
            echo $output;
        }
    }
    
    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        // return $id;
        
        // $posts = Review::where('id','<',$id)->orderBy('created_at','DESC')->limit(2)->get();
        $preferencebaru = Metadata::where('id','<',$id)->orderBy('id','DESC')->limit(2)->get();
        if(!$preferencebaru->isEmpty())
        {
            foreach($preferencebaru as $itemm)
            {
        // return $itemm;
                $url = url('blog/'.$itemm->id);
                $body = substr(strip_tags($itemm->title),0,500);
                $body .= strlen(strip_tags($itemm->title))>500?"...":"";
                                
                 $collection = collect(\App\Review::where("user_id", Auth::User()->id)->where("amazon_id", $itemm->amazon_id)->get());
                $output .= '
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-left mar-top-10">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding ">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding hide-bg-abu color-white">
                          <img src="'. $itemm->imUrl .'" alt="" class="img-cover">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 f-raleway f-13 no-padding color-white hide-bg-abu hide-bor-bot">
                      <p><strong>'.$itemm->title.'</strong></p>
                      <p>'.$itemm->artist.'</p>
                      <p>'.$itemm->root_genre.'</p>
                      <p>'.$itemm->first_release_year.'</p>
                      <p>
                        '.$collection.'
                      </p>
                        <p>
                            <input id="input-id" name="rating" type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium" data-rtl="false">
                        </p>
                    </div>
                  </div>
                </div>
                            ';
            }
            
            $output .= '
                      <div id="remove-row">
                        <div class="rows">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding color-white mar-top-10 text-center f-15">
                                <div class="padding bor-dash-top bor-color-white col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    Tampilkan Lebih Banyak<br>
                                    <span data-id="'.$itemm->id.'" id="btn-more"  class="glyphicon glyphicon-chevron-down"></span>
                                </div>
                            </div>
                        </div>
                    </div>
          ';
            
            // return $output;
        }
    }

    public function index()
    {
        $perPage = 8;

        if (!empty($keyword)) {
        $preference = Metadata::where('title', 'LIKE', "%$keyword%")
        ->orWhere('content', 'LIKE', "%$keyword%")
        ->orWhere('image', 'LIKE', "%$keyword%")
        ->orWhere('user_id', 'LIKE', "%$keyword%")

        ->paginate($perPage);
        } else {
        // $preference = Metadata::paginate($perPage);j
            $posts = Review::orderBy('created_at','DESC')->limit(10)->get();
           if (collect(Auth::user())->count() == null) {
               # code...
            $preferencebaru = Metadata::orderBy('id','DESC')->limit(10)->get();
            // return $preferencebaru;
            $preferencepopuler = Metadata::orderBy('id','DESC')->limit(10)->get();
           } 
           else{

            
            $preferencebaru = Metadata::orderBy('id','DESC')->paginate(10);
            // return $preferencebaru;
            $preferencepopuler = Metadata::orderBy('id','DESC')->paginate(4);
            $rekomendasii = Hasilrekomendasi::where('reviewerid',Auth::user()->id)
                ->where('rekomend', 'NO')
                ->join('metadata', 'hasilrekomdasi.amazon_id', 'metadata.amazon_id')->get();
            $rekomendasi = collect($rekomendasii)->sortByDesc('hasil');

            $session = Auth::user()->id;
	// $jlhu = $this->db->get('user')->num_rows();
    $jlhu = collect(User::get())->count();
    // $jlhi = $this->db->get('metadata')->num_rows();
    $jlhi = collect(Metadata::get())->count();
    $s = $jlhu + $jlhi;
	// $drate = $this->db->get('reviews')->result();
    $drate = collect(Review::get());
	// $duser = $this->db->get('user')->result();
    $duser = collect(User::get());
	// $ditem = $this->db->get('metadata')->result();
    $ditem = collect(Metadata::get());
	$awal = [];
	$matrix = [];
	$matrix1 = [];
	$trans = [];
	$kali = [];
	$pangkat = [];
	$hasil = [];
	$o = 0;
	foreach($drate as $rates){
		$ama[$o] = $rates->amazon_id;
		$rev[$o] = $rates->user_id;
		$rat[$o] = $rates->rating;
		$o++;
	}
	$i=0;
	foreach($duser as $usr){
		$user[$i] = $usr->id;
		$i++;
	}
	$j= 0;
	foreach($ditem as $itm){
		$item[$j] = $itm->amazon_id;
		$j++;
	}
	
	for ($i=0; $i < $jlhu; $i++) { 
		$id_user=$user[$i];
		for ($j=0; $j < $jlhi; $j++) { 
			$id_item=$item[$j];
			// $nilai = $this->db->query("select Rating from reviews where reviewerID='$id_user' and Amazon_id='$id_item' limit 1")->row();
            $nilai = Review::where('user_id', $id_user)->where('amazon_id', $id_item)->limit(1)->select('review.rating')->get();
			if(collect($nilai)->count()==null){
				$rating= 0;
			}
			else
			{
				$rating= $nilai[0]->rating;
			}
			// echo $awal[$i][$j] = $rating;
			 $awal[$i][$j] = $rating;
		}
	}
													
		for($i=0;$i<$jlhu;$i++){		
      		for($j=0;$j<$jlhi;$j++){				
				
				// echo $awal[$i][$j];				
				 $awal[$i][$j];				
			}						  
		}		
				

	//---- tahap 1--------------					
    for($i=0;$i<$s;$i++){		
      	if($i >= $jlhu){
		 	for($j=0;$j<$s;$j++){			 	
				if($j >= $jlhu){
					// echo $nilai = 0; 
					 $nilai = 0; 
				}else{
					// echo $nilai = $awal[$j][($i-$jlhu)%$jlhi];
					 $nilai = $awal[$j][($i-$jlhu)%$jlhi];
				}							
				$matrix[$i][$j] = $nilai;
		 	}
	  	}
	  	else{
            for($j=0;$j<$s;$j++){				
				if($j >= $jlhu){
					// echo $nilai = $awal[$i][$j-$jlhu];
					 $nilai = $awal[$i][$j-$jlhu];
				}else{
					// echo $nilai = 0;
					 $nilai = 0;
				}							
				$matrix[$i][$j] = $nilai;
			}				
         }		  
	}	
		//------------------- end tahap 1 -------------------
		
        //-------------------- tahap 3 ----------------------
												
		for($i=0;$i<$s;$i++){			
		  if($i >= $jlhu){
			 for($j=0;$j<$s;$j++){				 
				 if($j >= $jlhu){
					// echo $nilai = 0; 
					 $nilai = 0; 
				 }else{
				 	if ($matrix[$i][$j]>=3){
					  	// echo $nilai = 1 * -1;
					  	 $nilai = 1 * -1;
				 	}
				 	else if($matrix[$i][$j]<=2 && $matrix[$i][$j]!=0){
				 		// echo $nilai = -1;
				 		 $nilai = -1;
				 	}
				 	else{
				 		// echo $nilai = 0;
				 		 $nilai = 0;
				 	}
				 }							  
				  $matrix1[$i][$j] = $nilai;
			 }
		  }
		  else{
				for($j=0;$j<$s;$j++){
					 if($j >= $jlhu){
						if ($matrix[$i][$j]>=3){
						  	// echo $nilai = 1;
						  	 $nilai = 1;
					 	}
					 	else if($matrix[$i][$j]<=2 && $matrix[$i][$j]!=0){
					 		// echo $nilai = -1;
					 		 $nilai = -1;
					 	}
					 	else{
					 		// echo $nilai = 0;
					 		 $nilai = 0;
					 	}
					 }else{
						//  echo $nilai = 0;
						  $nilai = 0;
					 }
					 $matrix1[$i][$j] = $nilai;			
				}				
			  }
			}
		
		//-------------------- end tahap 3 ------------------
		
        //-------------------- tahap 4 = k -------------------
		//  $t_item = $this->db->get_where('reviews',['reviewerID'=>$session])->num_rows();
        $t_item = collect(Review::where('user_id', $session)->get())->count();
		if($t_item%2==0){
			//  echo $k = $t_item - 1;
			  $k = $t_item - 1;
		}else{
			//  echo $k = $t_item;
			  $k = $t_item;

		}
		    //  echo $n = ($k - 1)/2;
		      $n = ($k - 1)/2;
			 
		
		//-------------------- end tahap 4--------------------
		
        //----------- transpose -----------------------------
		
		for($i=0;$i<$s;$i++){
      		for($j=0;$j<$s;$j++){
				
				 $trans[$i][$j] = $matrix1[$j][$i];
			}				
		}
		
		for($i=0;$i<$s;$i++){
      		for($j=0;$j<$s;$j++){
				
				// echo $trans[$i][$j];
				$trans[$i][$j];
			}				
		}
		//------------------- end transpose----------
		
		//------------------ pangkat ----------------
		for($i=0;$i<$s;$i++){
      		for($j=0;$j<$s;$j++){
				$kali[$i][$j] = 0;
				for($k=0;$k<$s;$k++){
					$temp = $matrix1[$i][$k] * $trans[$k][$j];
					$kali[$i][$j] = $kali[$i][$j] + $temp;
				}		
					$pangkat[$i][$j] = pow($kali[$i][$j],$n);
			}			
		}
		
		for($i=0;$i<$s;$i++){
      		for($j=0;$j<$s;$j++){
				
				// echo $pangkat[$i][$j];
				 $pangkat[$i][$j];
			}				
		}
		//------------------ end pangkat ------------



		//--------------------- hasil akhir ---------
		for($i=0;$i<$s;$i++){
      		for($j=0;$j<$s;$j++){
				$hasil[$i][$j] = 0;
				for($k=0;$k<$s;$k++){
					$temp = $pangkat[$i][$k]* $matrix1[$k][$j];
					$hasil[$i][$j] = $hasil[$i][$j] + $temp;
				}		
			}			
		}
		
	
		for($i=0;$i<$s;$i++){
      		for($j=0;$j<$s;$j++){
				// echo $hasil[$i][$j];
            $hasil[$i][$j];
				
			}	
			 			
		}
		//----------------------- end hasil -------------
		

        //----------------------- hasil final ------------
        $z=0;
		for($u=0;$u<$jlhu;$u++){
			 $user[$u];
			if($user[$u] == $session){
				$z = $z;
                break;
			}
            else {
                $z++;
            }
		}

		for($p=0;$p<sizeof($hasil);$p++){
			if($p == $z){
				for($h=$jlhu;$h<sizeof($hasil);$h++){
					if($j >= $jlhu){
						 $recom[$h-$jlhu] = $hasil[$p][$h];
					}			
				}
			}
		}
		for($k=0;$k<sizeof($recom);$k++){
			for($e=0;$e<sizeof($item);$e++){
				if($k==$e){
					 $temp = $item[$e];
				}
			}
		}
		for($y=0;$y<sizeof($recom);$y++){	
			if($y >= $jlhu){
                $recom1 = $recom[$y-$jlhu];
			}					  			
		}
		for($i=0;$i<sizeof($recom);$i++){
			for($j=0;$j<6;$j++){
				if($j==0){
					 $nl = $i;
				}elseif($j==1){
					$nl = $session;
				}elseif($j==2){
					$nl = $item[$i];
				}elseif($j==3){
					 $nl = $awal[$z][$i];
				}elseif($j==4){
					if($awal[$z][$i] > 0){
						 $nl = "YES";
					}else{
						 $nl = "NO";
					}
				}else{
					$nl = $recom[$i];
				}
				$arr_recom [$i][$j] = $nl;
			}
		}

		for($i=0;$i<sizeof($recom);$i++){
				 $arr_recom [$i][0];
				 $arr_recom [$i][1];
				 $arr_recom [$i][2];
				 $arr_recom [$i][3];
				 $arr_recom [$i][4];
				 $arr_recom [$i][5];

                 $hasil_recomendasi = Hasilrekomendasi::where('reviewerid', $session)->where('amazon_id', $arr_recom[$i][2])->get()->first();
                //  return $hasil_recomendasi;
                 if (collect($hasil_recomendasi)->count() != null) {
                     $hslrekomndasi = Hasilrekomendasi::findOrFail($hasil_recomendasi->id);
                    //  return $hslrekomndasi;
                        $hslrekomndasi->reviewerid = $session;
                        $hslrekomndasi->amazon_id = $arr_recom[$i][2];
                        $hslrekomndasi->rating = $arr_recom[$i][3];
                        $hslrekomndasi->rekomend = $arr_recom[$i][4];
                        $hslrekomndasi->hasil = $arr_recom[$i][5];
                     $hslrekomndasi->update();
                 }
                 else {
                    $hslrekomndasi = new Hasilrekomendasi();
                    $hslrekomndasi->reviewerid = $session;
                    $hslrekomndasi->amazon_id = $arr_recom[$i][2];
                    $hslrekomndasi->rating = $arr_recom[$i][3];
                    $hslrekomndasi->rekomend = $arr_recom[$i][4];
                    $hslrekomndasi->hasil = $arr_recom[$i][5];

                    $hslrekomndasi->save();

                    // return $hslrekomndasi;
                 }
				// $this->db->insert('hasil_recom',['reviewerID'=>$session,'amazon_id'=>$arr_recom [$i][2],'rating'=>$arr_recom [$i][3],'recommend'=>$arr_recom [$i][4],'hasil'=>$arr_recom [$i][5]]);
		}
        // return $hslrekomndasi;
        // return $hasil;
    // $hasil['new_song'] = $this->member_model->some_new_song()->result();
    // $hasil['popular_song'] = $this->member_model->some_popular_song()->result();

           }
        }
        return view('member.index', compact('preferencebaru', 'preferencepopuler', 'rekomendasi'));        
    }

    public function preference()
    {
        $page = 1;
        $perPage = 1;

        if (!empty($keyword)) {
        $preference = Metadata::where('title', 'LIKE', "%$keyword%")
        ->orWhere('content', 'LIKE', "%$keyword%")
        ->orWhere('image', 'LIKE', "%$keyword%")
        ->orWhere('user_id', 'LIKE', "%$keyword%")

        ->paginate($perPage);
        } else {
        // $preference = Metadata::paginate($perPage);
        $preferencee = Review::where('user_id', Auth::user()->id)->get();
        $preference = Metadata::whereNotIn('amazon_id', $preferencee->pluck('amazon_id'))->inRandomOrder()->paginate($perPage);

        }
      # code...
      return view('member.preference', compact('preference', 'page'));
    
    }

    public function preference2()
    {
        $page = 2;
        $perPage = 1;

        if (!empty($keyword)) {
        $preference = Metadata::where('title', 'LIKE', "%$keyword%")
        ->orWhere('content', 'LIKE', "%$keyword%")
        ->orWhere('image', 'LIKE', "%$keyword%")
        ->orWhere('user_id', 'LIKE', "%$keyword%")

        ->paginate($perPage);
        } else {
        // $preference = Metadata::inRandomOrder()->paginate($perPage);
        $preferencee = Review::where('user_id', Auth::user()->id)->get();
        $preference = Metadata::whereNotIn('amazon_id', $preferencee->pluck('amazon_id'))->inRandomOrder()->paginate($perPage);
        }
      # code...
      return view('member.preference', compact('preference', 'page'));
    
    }

    public function preference3()
    {
        $page = 3;
        $perPage = 1;

        if (!empty($keyword)) {
        $preference = Metadata::where('title', 'LIKE', "%$keyword%")
        ->orWhere('content', 'LIKE', "%$keyword%")
        ->orWhere('image', 'LIKE', "%$keyword%")
        ->orWhere('user_id', 'LIKE', "%$keyword%")

        ->paginate($perPage);
        } else {
        // $preference = Metadata::inRandomOrder()->paginate($perPage);
        $preferencee = Review::where('user_id', Auth::user()->id)->get();
        $preference = Metadata::whereNotIn('amazon_id', $preferencee->pluck('amazon_id'))->paginate($perPage);
        }
      # code...
      return view('member.preference', compact('preference', 'page'));
    
    }
    public function preference4()
    {
        $page = 4;
        $perPage = 1;

        if (!empty($keyword)) {
        $preference = Metadata::where('title', 'LIKE', "%$keyword%")
        ->orWhere('content', 'LIKE', "%$keyword%")
        ->orWhere('image', 'LIKE', "%$keyword%")
        ->orWhere('user_id', 'LIKE', "%$keyword%")

        ->paginate($perPage);
        } else {
        $preferencee = Review::where('user_id', Auth::user()->id)->get();
        $preference = Metadata::whereNotIn('amazon_id', $preferencee->pluck('amazon_id'))->paginate($perPage);
        }
      # code...
      return view('member.preference', compact('preference', 'page'));
    
    }

    public function preference5()
    {
        $page = 5;
        $perPage = 1;

        if (!empty($keyword)) {
        $preference = Metadata::where('title', 'LIKE', "%$keyword%")
        ->orWhere('content', 'LIKE', "%$keyword%")
        ->orWhere('image', 'LIKE', "%$keyword%")
        ->orWhere('user_id', 'LIKE', "%$keyword%")

        ->paginate($perPage);
        } else {
        $preferencee = Review::where('user_id', Auth::user()->id)->get();
        $preference = Metadata::whereNotIn('amazon_id', $preferencee->pluck('amazon_id'))->paginate($perPage);
        }
      # code...
      return view('member.preference', compact('preference', 'page'));
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $amazon_id = $request->get('amazon_id');
        $rating = $request->get('rating');
        $user = Auth::user();
        $page = $request->get('page');


        $review = new Review();
        $review->user_id = $user->id;
        $review->amazon_id = $amazon_id;
        $review->nama_user = $user->name;
        $review->rating = $rating;
        $review->save();

        if ($page == 1) {
            return redirect()->route('preference/2');
        }
        elseif ($page == 2) {
            return redirect()->route('preference/3');
        }
        elseif ($page == 3) {
            return redirect()->route('preference/4');
        }
        elseif ($page == 4) {
            return redirect()->route('preference/5');
        }
        elseif ($page == 5) {
            return redirect()->route('/');
        }
    }

    public function createdetail(Request $request)
    {
        $amazon_id = $request->get('amazon_id');
        $rating = $request->get('rating');
        $user = Auth::user();
        // $page = $request->get('page');

        $revieww = Review::where('user_id', $user->id)->where('amazon_id', $amazon_id)->get()->first();

        if (collect($revieww)->count() != null) {
            $reviewww = Review::findOrFail($revieww->id);
        //  return $reviewww;
            $reviewww->user_id = $user->id;
            $reviewww->amazon_id = $amazon_id;
            $reviewww->nama_user = $user->name;
            $reviewww->rating = $rating;
            $reviewww->update();
        }
        else {
            $reviewww = new Review();
            $reviewww->user_id = $user->id;
            $reviewww->amazon_id = $amazon_id;
            $reviewww->nama_user = $user->name;
            $reviewww->rating = $rating;
            $reviewww->save();

        // return $reviewww;
        }

        return redirect()->route('/');
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

        if (collect(Auth::user())->count() == null) {
            $musik = Metadata::findOrFail($id);
        }
        else {
            $musik = Review::where('user_id',Auth::user()->id)
                ->join('metadata', 'review.amazon_id', 'metadata.amazon_id')->where('metadata.id', $id)->get();
            if (collect($musik)->count() == null) {
                $musik = Metadata::findOrFail($id);
                // $rekomendasi = Review::where('user_id',Auth::user()->id)
                // ->join('metadata', 'review.amazon_id', 'metadata.amazon_id')->get();
                $rekomendasii = Hasilrekomendasi::where('reviewerid',Auth::user()->id)
                ->where('rekomend', 'NO')
                ->join('metadata', 'hasilrekomdasi.amazon_id', 'metadata.amazon_id')->get();
            $rekomendasi = collect($rekomendasii)->sortByDesc('hasil');
            }
            else {
                $musik = $musik[0];
                $rekomendasii = Hasilrekomendasi::where('reviewerid',Auth::user()->id)
                ->where('rekomend', 'NO')
                ->join('metadata', 'hasilrekomdasi.amazon_id', 'metadata.amazon_id')->get();
            $rekomendasi = collect($rekomendasii)->sortByDesc('hasil');
                // $rekomendasi = Review::where('user_id',Auth::user()->id)
                // ->join('metadata', 'review.amazon_id', 'metadata.amazon_id')->get();
            }            
        }
        // if (collect(Auth::user()->id)->count() == null) {

        
            //     return $musik;
            // $musik = $musik[0];
            // $musik = Review::where('user_id',Auth::user()->id)
            //     ->join('metadata', 'review.amazon_id', 'metadata.amazon_id')->where('metadata.id', $id)->get();
            // $musik = $musik[0];
        

        return view('member.detailmusik', compact('musik','rekomendasi'));
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
