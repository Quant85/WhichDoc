<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use DateTime;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

use function PHPUnit\Framework\objectEquals;

class ChartJSController extends Controller
{
    //

    /* Json */
    public function jsonDataMessage()
    {
        return  json_decode(Auth::user()->messages->sortBy('created_at',false)->pluck('created_at'));
    }

    public function jsonDataRatings()
    {
        return  json_decode(Auth::user()->ratings->sortBy('created_at',false)->pluck('created_at'));
    }

    /*End Json */

        /* Months */
    public function getAllMonths($json)
    {
        $month_array = array();
        $doctor_date = $json;

        if ( ! empty( $doctor_date ) ) {
			foreach ( $doctor_date as $unformatted_date ) {
                $date = new \DateTime($unformatted_date);
				$month_no = $date->format( 'm y' );
				$month_name = $date->format( 'M Y' );
				$month_array[ $month_no ] = $month_name;
			}
		}
        return $month_array;
    }


    function getMonthlyElementCount( $month, $json ) {
        $doctor_date = $json;
        $month_array = array();
        if ( ! empty( $doctor_date ) ) {
			foreach ( $doctor_date as $i => $unformatted_date ) {
                $date = new \DateTime($unformatted_date);
				$month_no = $date->format( 'm y' );
                array_push($month_array,$month_no);
			}
		}
        $monthly_array_element_count = array_count_values($month_array);
        //dd($monthly_array_message_count[$month]);

		return $monthly_array_element_count[$month];
	}

        /* End Months */

        /* Years */
    public function getAllYears($json)
    {
        $year_array = array();
        $doctor_date = $json;

        if ( ! empty( $doctor_date ) ) {
			foreach ( $doctor_date as $unformatted_date ) {
                $date = new \DateTime($unformatted_date);
				$year_no = $date->format( 'y' );
				$year_name = $date->format( 'Y' );
				$year_array[ $year_no ] = $year_name;
			}
		}
        return $year_array;
    }

    public function getYearsElementCount ( $year, $json ){
        $doctor_date = $json;
        $year_array = array();
        if ( ! empty( $doctor_date ) ) {
            //dd($doctor_messages_date);
			foreach ( $doctor_date as $i => $unformatted_date ) {
                $date = new \DateTime($unformatted_date);
				$year_no = $date->format( 'y' );
                array_push($year_array,$year_no);
			}
		}
        $year_array_element_count = array_count_values($year_array);
        //dd($year_array_message_count[$year]);

		return $year_array_element_count[$year];
    }

         /*End Years */



    

    function getChartsData() {
        
        /*Messages */
             /* Mounth */
		$monthly_message_count_array = array();
		$month_array_message = $this->getAllMonths($this->jsonDataMessage());
		$month_name_array_message = array();
		if ( ! empty( $month_array_message ) ) {
            foreach ( $month_array_message as $month_no => $month_name ){
				$monthly_message_count = $this->getMonthlyElementCount( $month_no, $this->jsonDataMessage() );
				array_push( $monthly_message_count_array, $monthly_message_count );
				array_push( $month_name_array_message, $month_name );
			}
		}
             /*End Mounth */

            /* Year */

        $year_message_count_array = array();
		$year_array_message = $this->getAllYears($this->jsonDataMessage());
		$year_name_array_message = array();
        if ( ! empty( $year_array_message ) ) {
            foreach ( $year_array_message as $year_no => $year_name ){
				$years_message_count = $this->getYearsElementCount( $year_no, $this->jsonDataMessage() );
				array_push( $year_message_count_array, $years_message_count );
				array_push( $year_name_array_message, $year_name );
			}
		}
            /* End year */

        /*End Messages */

        /*Rating */
            /* Mounth */

		$month_array_rating = $this->getAllMonths($this->jsonDataRatings());
        $monthly_rating_count_array = array();
		$month_name_array_rating = array();
		if ( ! empty( $month_array_rating ) ) {
            foreach ( $month_array_rating as $month_no => $month_name ){
				$monthly_rating_count = $this->getMonthlyElementCount( $month_no, $this->jsonDataRatings() );
				array_push( $monthly_rating_count_array, $monthly_rating_count );
				array_push( $month_name_array_rating, $month_name );
			}
		}
            /*End Mounth */

            /*Year */
        $year_array_rating = $this->getAllYears($this->jsonDataRatings());
        $year_rating_count_array = array();
		$year_name_array_rating = array();
        if ( ! empty( $year_array_rating ) ) {
            foreach ( $year_array_rating as $year_no => $year_name ){
				$years_rating_count = $this->getYearsElementCount( $year_no, $this->jsonDataRatings() );
				array_push( $year_rating_count_array, $years_rating_count );
				array_push( $year_name_array_rating, $year_name );
			}
		}

            /* End Year */
            $contenitore_voti =array();
            $json_voti = json_decode(Auth::user()->ratings->sortBy('created_at',false)->pluck('voto'));
            $json_data = json_decode(Auth::user()->ratings->sortBy('created_at',false)->pluck('created_at'));

            function array_combine_($keys, $values)
            {
                $result = array();
                foreach ($keys as $i => $k) {
                    $result[$k][] = $values[$i];
                }
                
                array_walk($result, function($v){
                    $v = (count($v) == 1)? array_pop($v): $v;
                });
                return    $result;
            }
            $newArray = array_combine_($json_data,$json_voti);
            if (!empty($newArray)) {
                foreach ($month_name_array_rating as $key => $value) {
                    $oggetto_voto = array();
    
                    //dd($newArray);
                    $oggetto_voto[ 'data_range' ] = $value;
                    for ($z=1; $z <= 5 ; $z++) { 
                        $i=0;
                        foreach ($newArray as $key => $voti) {
                            $oggetto_voto[ 'voto_'.($z) ] = $i;
                            $date = new \DateTime($key);
                            $referent_month = $date->format( 'M Y' ); 
                            //dd($key,$voti,$referent_month,$value);
                                foreach ($voti as $voto) {
                                    ((($voto == $z) && ($referent_month == $value) )? ($i = ++$i): $i);
                                    /* if ($voto == $z) {
                                        $i = ++$i;
                                    } */
                            }//questo if potrtebbe esser eliminato
                        }//il problema della contabilizzazione è su questo foreach
                    }
                    array_push( $contenitore_voti, $oggetto_voto );
                }
            }
            //dd($contenitore_voti,$month_name_array_rating,$newArray,$key,$referent_month,$value,$voti,$voto,$z,$i);
            //dd($array_voti,$contenitore_voti,$oggetto_voto);

            


		/* $max_no = max( $monthly_message_count_array );
        dd($max_no);
		$max = round(( $max_no + 10/2 ) / 10 ) * 10; */
		$data_array = array(
            'resources'=>[
                /* Messages */
                    'messages'=>[
                        'months_message' => $month_name_array_message,
                        'message_count_data' => $monthly_message_count_array,    
                        'years_message' => $year_name_array_message,
                        'years_message_count_data' => $year_message_count_array, 
                    ],
                 /*End Messages */
                 /*Retings */
                'ratings'=>[
                    'months_rating' => $month_name_array_rating,
                    'rating_count_data' => $monthly_rating_count_array,    
                    'years_rating' => $year_name_array_rating,
                    'years_rating_count_data' => $year_rating_count_array,
                ],
                'votes'=>[
                    'range_vote' => $contenitore_voti,
                    /* 'media' => $contenitore_voti, */
                ]
            ]
		);

		return $data_array;

    }
}
